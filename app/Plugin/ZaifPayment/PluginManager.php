<?php

namespace Plugin\ZaifPayment;

use Eccube\Plugin\AbstractPluginManager;
use Eccube\Entity\Payment;
use Plugin\ZaifPayment\Entity\ZaifPayment;

class PluginManager extends AbstractPluginManager
{
    private $logger = null;

    public function install($config, $app) 
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code']);
    }

    public function uninstall($config, $app) 
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code'], 0);
    }

    public function enable($config, $app) 
    {
        $this->logger = $app['monolog'];
        $this->getCurrencies($app);
        $this->registerZaifAsPayment($app);
        $this->registerPageLayout($app);
    }

    public function disable($config, $app) 
    {
        $this->logger = $app['monolog'];
        $this->unregisterPageLayout($app);
        $this->unregisterZaifAsPayment($app);
        $this->removeCurrencies($app);
    }

    public function update($config, $app) 
    {

    }
    
    protected function registerZaifAsPayment($app)
    {
        $em = $app['orm.em'];
        $creator = $em->getRepository('\Eccube\Entity\Member')->find(2);
        $payments = $em->getRepository('\Eccube\Entity\Payment')->findAll();

        // 既存な通貨を処理する
        foreach ($payments as $payment) {
            if (mb_ereg('Zaif決済', $payment->getMethod())) {
                // 新しい通貨セットの中にあるか？
                $exist = false;
                foreach ($this->currencies->return as $symbol => $name) {
                    if ($payment->getMethod() == $name.' [Zaif決済]') {
                        $exist = true;
                        break;
                    }
                }

                if ($exist) { // 新しい通貨セットの中にある
                    $payment->setDelFlg(0); // 復活！
                    $em->persist($payment);
                } else { // 新しい通貨セットの中にない
                    $payment->setDelFlg(1); // ナカッタ...
                    $em->persist($payment);
                }
            }
        }

        // 新しい通貨を追加する
        foreach($this->currencies->return as $symbol => $name) {
            $zaif = $em->getRepository('\Eccube\Entity\Payment')->findOneBy(array('method'=>$name.' [Zaif決済]')); 
            if (is_null($zaif)) {
                $payment = new Payment();
                $payment
                    ->setCreator($creator)
                    ->setDelFlg(0)
                    ->setCharge(0)
                    ->setFixFlg(1)
                    ->setRank(10)
                    ->setChargeFlg(1)
                    ->setRuleMin(0)
                    ->setMethod($name.' [Zaif決済]');

                $em->persist($payment);
            }
        }
        $em->flush();
    }

    protected function unregisterZaifAsPayment($app)
    {
        $em = $app['orm.em'];
        $payments = $em->getRepository('\Eccube\Entity\Payment')->findAll();
        foreach ($payments as $payment) {
            if (mb_ereg('Zaif決済', $payment->getMethod())) {
                $payment->setDelFlg(1);
                $em->persist($payment);
            }
        }
        $em->flush();
    }
    
    protected function registerPageLayout($app)
    {
        foreach($this->currencies->return as $symbol => $name) {
            $url = "zaif_".$symbol."_payment";
            $deviceType = $app['eccube.repository.master.device_type']->find(10);
            $pageLayout = $app['eccube.repository.page_layout']->findOneBy(array('url' => $url));
            if (is_null($pageLayout)) {
                $pageLayout = $app['eccube.repository.page_layout']->newPageLayout($deviceType);
            }

            $pageLayout->setName('商品購入/'.$name.' Zaif決済画面');
            $pageLayout->setUrl($url);
            $pageLayout->setMetaRobots('noindex');
            $pageLayout->setEditFlg('2');
            $app['orm.em']->persist($pageLayout);
        }
        $app['orm.em']->flush();
    }

    protected function unregisterPageLayout($app)
    {
        $em = $app['orm.em'];
        $c = $em->getRepository('\Plugin\ZaifPayment\Entity\ZaifPayment')->find(array('mainkey'=>'currencies','subkey'=>''));
        if (!is_null($c)) {
            $this->currencies = unserialize($c->getValue());
            foreach($this->currencies->return as $symbol => $name) {
                $zaif = $em->getRepository('\Eccube\Entity\PageLayout')->findOneBy(array('url'=>'zaif_'.$symbol.'_payment')); 
                if(!is_null($zaif)) {
                    $em->remove($zaif);
                    $em->flush();
                }
            }
        }
    }

    protected function getCurrencies($app)
    {
        $em = $app['orm.em'];

        /* 毎回取りに行くことにする。 Zaif決済プラグインを一度無効にして有効にすることで対応通過を更新できるように。
         * 一度取ったのを使い回すにはremoveCurrencies()で削除しないようにすればいい。
         */
        $c = $em->getRepository('\Plugin\ZaifPayment\Entity\ZaifPayment')->find(array('mainkey'=>'currencies','subkey'=>''));
        if (!is_null($c)) {
            $this->currencies = unserialize($c->getValue());
        } else {
            $url = 'https://api.zaif.jp/ecapi';
            $data = array (
                'method' => 'getSupportedCurrencies',
                'nonce' => time(),
            );
            $data = http_build_query($data, "", "&");
            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'content' => $data,
            ));
            $options = stream_context_create($options);
            $contents = @file_get_contents($url, false, $options);
            if ($contents === false) {
                return false;    
            } else {
                $this->currencies = json_decode($contents);
                if ($this->currencies->success == 0) {
                    return false;
                } else {
                    $currencies = new ZaifPayment();
                    $currencies->setMainKey('currencies');
                    $currencies->setSubkey('');
                    $currencies->setValue(serialize($this->currencies));
                    $app['orm.em']->persist($currencies);
                    $app['orm.em']->flush();
                }
            }
        }
    }

    protected function removeCurrencies($app)
    {
        $em = $app['orm.em'];
        $c = $em->getRepository('\Plugin\ZaifPayment\Entity\ZaifPayment')->find(array('mainkey'=>'currencies','subkey'=>''));
        if (!is_null($c)) {
            $em->remove($c);
            $em->flush();
        }
    }
}

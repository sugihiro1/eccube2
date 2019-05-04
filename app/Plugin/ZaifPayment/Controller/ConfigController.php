<?php
namespace Plugin\ZaifPayment\Controller;

use Eccube\Application;
use Eccube\Entity\Payment;
use Plugin\ZaifPayment\Entity\ZaifPayment;
use Plugin\ZaifPayment\Form\Type\ZaifPaymentConfigType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class ConfigController
{
    public function edit(Application $app, Request $request)
    {
        $this->app = $app;
        $logger = $app['monolog.zaif.payment'];
        
        $data = array();
        $apikey = $app['eccube.plugin.repository.zaif_payment']->find(array('mainkey'=>'apikey','subkey'=>''));
        if (!$apikey) {
            $data['apikey'] = "";
        } else {
            $data['apikey'] = $apikey->getValue();
        }
        $apisecret = $app['eccube.plugin.repository.zaif_payment']->find(array('mainkey'=>'apisecret','subkey'=>''));
        if (!$apisecret) {
            $data['apisecret'] = "";
        } else {
            $data['apisecret'] = $apisecret->getValue();
        }

        $configForm = new ZaifPaymentConfigType($app, $data);
        $form = $app['form.factory']->createBuilder($configForm)->getForm();

        if ('POST' === $request->getMethod()) {
            if (isset($_POST['updateCurrencies'])) {
                $this->getCurrencies($app);
                $this->registerZaifAsPayment($app);
                $this->unregisterPageLayout($app);
                $this->registerPageLayout($app);

                $c = '';
                foreach ($this->currencies->return as $symbol => $name) {
                    if($c!='') {
                        $c .= ' / ';
                    }
                    $c .= $name;
                }
                $app->addSuccess('対応通貨の更新に成功しました。 [新しい対応通貨: '.$c.' ]', 'admin');
            } else {
                $form->handleRequest($request);
                
                if ($form->isValid()) {
                    $data = $form->getData();

                    if (!$apikey) {
                        $apikey = new ZaifPayment();
                        $apikey->setMainKey('apikey');
                        $apikey->setSubkey('');
                    }
                    if (!$apisecret) {
                        $apisecret = new ZaifPayment();
                        $apisecret->setMainKey('apisecret');
                        $apisecret->setSubkey('');
                    }
                    $apikey->setValue($data['apikey']);
                    $apisecret->setValue($data['apisecret']);
                    $app['orm.em']->persist($apikey);
                    $app['orm.em']->persist($apisecret);
                    $app['orm.em']->flush();

                    $app->addSuccess('admin.zaif_payment.save.complete', 'admin');
                }
            }
        }

        return $app->render('ZaifPayment/Resource/template/admin/config.twig', array(
            'form' => $form->createView(),
        ));
        
    }
    
    protected function registerZaifAsPayment($app)
    {
        $em = $app['orm.em'];
        $logger = $app['monolog.zaif.payment'];

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
        $pages = $em->getRepository('\Eccube\Entity\PageLayout')->findAll();
        foreach ($pages as $page) {
            if (mb_ereg('Zaif決済', $page->getName())) {
                $em->remove($page);
            }
        }
        $em->flush();
    }

    protected function getCurrencies($app)
    {
        $em = $app['orm.em'];
        $logger = $app['monolog.zaif.payment'];

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
                //$this->currencies->return->xem = "XEM";
                $c = $em->getRepository('\Plugin\ZaifPayment\Entity\ZaifPayment')->find(array('mainkey'=>'currencies','subkey'=>''));
                if (!is_null($c)) {
                    $currencies = $c;
                } else {
                    $currencies = new ZaifPayment();
                }
                $currencies->setMainKey('currencies');
                $currencies->setSubkey('');
                $currencies->setValue(serialize($this->currencies));
                $app['orm.em']->persist($currencies);
                $app['orm.em']->flush();
            }
        }
    }
}

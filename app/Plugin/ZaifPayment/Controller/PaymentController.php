<?php

namespace Plugin\ZaifPayment\Controller;

use Eccube\Application;
use Eccube\Common\Constant;
use Symfony\Component\HttpFoundation\Request;

class PaymentController
{
    public $app;

    public function index(\Eccube\Application $app)
    {
        $this->app = $app;
        $logger = $app['monolog.zaif.payment'];
        $order = $app['eccube.repository.order']->findOneBy(array('pre_order_id' => $app['eccube.service.cart']->getPreOrderId()));
        if (is_null($order)) {
            $error_title = 'エラー';
            $error_message = "注文情報の取得が出来ませんでした。この手続きは無効となりました。";
            return $app['view']->render('error.twig', array('error_message' => $error_message, 'error_title'=> $error_title));
        }

        // 商品公開ステータスチェック、商品制限数チェック、在庫チェック
        if (!$this->checkStockProduct($app, $order)) {
            $app->addError('front.shopping.stock.error');
            return $app->redirect($app->url('shopping_error'));
        }

        // for title
        $title = $order->getPaymentMethod();
        $url = '';
/*
        if ($title == 'ビットコイン [Zaif決済]') {
            $currency = 'btc';
            $actionurl = $app->url('zaif_btc_payment');
        } else {
            $currency = 'mona';
            $actionurl = $app->url('zaif_mona_payment');
 */
        if ($title == 'bitcoin [BTC]') {
            $currency = 'btc';
            $actionurl = $app->url('cm_btc_payment');
        } elseif ($title == 'ethereum [ETH]') {
            $currency = 'eth';
            $actionurl = $app->url('cm_eth_payment');
        } elseif ($title == 'bitcoin cash [BCH]') {
            $currency = 'bch';
            $actionurl = $app->url('cm_bch_payment');
        } elseif ($title == 'cryptomall [XMALL]') {
            $currency = 'xmall';
            $actionurl = $app->url('cm_xmall_payment');
        }

        if ('POST' === $this->app['request']->getMethod()) {
            $order_status = $app['config']['order_pay_wait'];
            $order->setOrderStatus($app['eccube.repository.order_status']->find($order_status));
            $this->app['orm.em']->persist($order);
            $this->app['orm.em']->flush();
            $this->app['eccube.service.shopping']->notifyComplete($order);
            $this->app['eccube.service.shopping']->sendOrderMail($order);
            $this->app['eccube.service.cart']->clear()->save();
            $this->app['session']->set('eccube.front.shopping.order.id', $order->getId());
            return $this->app->redirect($this->app['url_generator']->generate('shopping_complete'));
        }
/* */
        $invoiceid = '';
        try {
            $apikey = $app['eccube.plugin.repository.zaif_payment']->find(array('mainkey'=>'apikey','subkey'=>''));
            $apisecret = $app['eccube.plugin.repository.zaif_payment']->find(array('mainkey'=>'apisecret','subkey'=>''));
            if (!$apikey || !$apisecret) {
                throw new \Exception("Zaif決済プラグインは現在利用できません");
            }
            $url = 'https://api.zaif.jp/ecapi';
            $data = array (
                'method' => 'createInvoice',
                'key' => $apikey->getValue(),
                'sha1secret' => sha1($apisecret->getValue()),
                'nonce' => time(),
                'speed' => 'high',
                'currency' => $currency,
                'amount' => $order->getPaymentTotal(),
                'orderNumber' => $order->getId(),
                'merchantName' => 'EC-CUBE ZaifPaymentPlugin',
            );
            $data = http_build_query($data, "", "&");
            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'content' => $data,
            ));
            /*
            $options = stream_context_create($options);
            $contents = @file_get_contents($url, false, $options);
            if ($contents === false) {
                throw new \Exception("Zaif決済サービスインボイスの作成に失敗しました");
            } else {
                $contents = json_decode($contents);
                if ($contents->success == 0) {
                    throw new \Exception("Zaif決済サービスインボイスの作成に失敗しました");
                } else {
                    $invoiceid = $contents->return->invoiceId;
                }
            }
             */
        } catch (\Exception $e) {
            $error_title = 'エラー';
            $error_message = $e->getMessage();
            return $app['view']->render('error.twig', array('error_message' => $error_message, 'error_title'=> $error_title));
        }
/* */
        // for error message
        $error = array('payment'=>'');
        $rateId = 1;
        $paymentId =$order->getPayment()->getId();
        if ($paymentId == 6 ) {
            $rateId = 1;
        } elseif ($paymentId == 16) {
            $rateId = 4;
        } elseif ($paymentId == 15 ) {
            $rateId = 3;
        } 

        $arrRate = $app['eccube.repository.master.rate']->get($rateId);
        $rate = $arrRate['name'];
        
        return $this->app['view']->render('ZaifPayment/Resource/template/default/paying.twig', array(
            'invoiceId' => $invoiceid,
            'actionurl' => $actionurl,
            'title' => $title,
            'error' => $error,
            // cryptomall
            'currency' => $currency,
            //'amount' => floor($order->getPaymentTotal() / 749971.0 * 100000000) / 100000000,
            'amount' => number_format( $order->getPaymentTotal() / $rate ,5 ),
            'orderNumber' => $order->getId(),
            'merchantName' => 'cryptomall',
        ));
    }

    private function checkStockProduct($app, $Order)
    {
        $listOldVersion = array('3.0.1', '3.0.2', '3.0.3', '3.0.4');
        $orderService = in_array(Constant::VERSION, $listOldVersion) ? $app['eccube.service.order'] : $app['eccube.service.shopping'];
        return $orderService->isOrderProduct($app['orm.em'], $Order);
    }

    public function goBack(Application $app, Request $request)
    {
        $Order = $app['eccube.repository.order']->findOneBy(array('pre_order_id' => $app['eccube.service.cart']->getPreOrderId()));
        // 受注情報を更新（購入処理中として更新する）
        $Order->setOrderStatus($app['eccube.repository.order_status']->find($app['config']['order_processing']));
        $app['orm.em']->persist($Order);
        $app['orm.em']->flush();

        return $app->redirect($app->url('shopping'));
    }

}

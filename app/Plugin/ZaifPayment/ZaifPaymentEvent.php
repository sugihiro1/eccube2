<?php

namespace Plugin\ZaifPayment;

use Eccube\Util\EntityUtil;
use Eccube\Common\Constant;
use Eccube\Event\EventArgs;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Plugin\ZaifPayment\Event\WorkPlace\ServiceMail;

class ZaifPaymentEvent
{

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function onAdminOrderEditZaifPaymentInitialize(FilterResponseEvent $event)
    {
        $logger = $this->app['monolog.zaif.payment'];
        if ($this->app->isGranted('ROLE_ADMIN')) {
            $orderid = $this->app['request']->get('id');
            $payment = $this->app['eccube.repository.order']->findOneBy(array('id' => $orderid))->getPayment();

            $note = $this->app['eccube.repository.order']->findOneBy(array('id' => $orderid))->getNote();
            preg_match('/Amount:\s?(\d*\.\d+)/', $note, $match);
            $amount = "";
            if (count($match) > 1) $amount = $match[1];

            //if (!is_null($payment) && mb_ereg('Zaif決済', $payment->getMethod())) {
            if (!is_null($payment) && mb_ereg('BTC', $payment->getMethod())) {
                $response = $event->getResponse();
                $crawler = new Crawler($response->getContent());
                $html = $this->getHtml($crawler);
/*
                try {
                    $invoiceid = '';
                    $apikey = $this->app['eccube.plugin.repository.zaif_payment']->find(array('mainkey'=>'apikey','subkey'=>''));
                    $apisecret = $this->app['eccube.plugin.repository.zaif_payment']->find(array('mainkey'=>'apisecret','subkey'=>''));
                    if (!$apikey || !$apisecret) {
                        throw new \Exception("決済プラグインは現在利用できません");
                    }
                    $url = 'https://api.zaif.jp/ecapi';
                    $data = array (
                        'method' => 'getInvoiceIdsByOrderNumber',
                        'key' => $apikey->getValue(),
                        'sha1secret' => sha1($apisecret->getValue()),
                        'nonce' => time(),
                        'orderNumber' => $orderid,
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
                        throw new \Exception("決済サービスインボイスの作成に失敗しました");
                    } else {
                        $contents = json_decode($contents);
                        if ($contents->success == 0 || ($contents->success == 1 && $contents->return->counts == 0)) {
                            throw new \Exception("決済サービスインボイスの作成に失敗しました");
                        } else {
                            $invoiceids = $contents->return->invoiceIds;
                        }
                    }
                    $paymentid = $payment->getId();
                    $iframe = "<div style='margin: 9px 0;'><iframe id='zaif_ec_iframe' scrolling='yes' allowtransparency='true' frameborder='0' src='https://zaif.jp/invoice/iframe/".$invoiceids[0]."' style='width: 100%; height: 300px; overflow: hidden;'></iframe></div>";
                } catch (\Exception $e) {
                    $iframe = "<div style='margin: 9px 0;'>決済インボイスの取得に失敗しました。時間をおいて再度お試しください。</div>";
                }
 */
                # Dammy
                #$paymentid = "1";

                $iframe = "<div style='margin: 9px 0;'><iframe src='https://admin.crypto-mall.org/invoices/btc?order_id=".$orderid."&amount=".$amount."' width='100%' height='700' frameborder='0' scrolling='no' marginwidth='0' marginheight='0'>エラーが発生しております。support@crypto-mall.orgまでご連絡ください。</iframe></div>";
                $additional = '
                    <script type="text/javascript">
                        $("#order_Payment").after("<input type='."'hidden'".' name='."'order[Payment]'".' id='."'order_payment'".' value='."'$paymentid'".' />");
                        $("#order_Payment").after("'.$iframe.'");
                        $("#order_Payment").attr("disabled", "disabled");
                        $("#payment_info_box__payment_method dd p").hide();
                    </script>
                    </body>
                ';
                $html = str_replace("</body>", $additional, $html);

                html_entity_decode($html, ENT_NOQUOTES, 'UTF-8');
                $response->setContent($html);
                $event->setResponse($response);
            }
        }
    }

    public function onRenderZaifPaymentShoppingBefore(FilterResponseEvent $event)
    {

        $logger = $this->app['monolog.zaif.payment'];
        $nonMember = $this->app['session']->get('eccube.front.shopping.nonmember');
        if ($this->app->isGranted('ROLE_USER') || !is_null($nonMember)) {
            $Order = $this->app['eccube.repository.order']->findOneBy(array('pre_order_id' => $this->app['eccube.service.cart']->getPreOrderId()));

            if (!is_null($Order)) {
                if ($Order->getPaymentMethod()=='ビットコイン [Zaif決済]' ||
                    $Order->getPaymentMethod()=='モナコイン [Zaif決済]' ||
                    # for criptomall
                    $Order->getPaymentMethod()=='cyptomall token [XMALL]' ||
                    $Order->getPaymentMethod()=='bitcoin [BTC]' ||
                    $Order->getPaymentMethod()=='ethereum [ETH]' ||
                    $Order->getPaymentMethod()=='bitcoin cash [BCH]') {
                    $Payment = $Order->getPayment();
                    // Get request
                    $request = $event->getRequest();
                    // Get response
                    $response = $event->getResponse();
                    // Proccess html
                    $html = $this->getHtmlShoppingConfirm($request, $response, $Payment);
                    // Set content for response
                    $response->setContent($html);
                    $event->setResponse($response);
                }
            }
        }
    }

    private function getHtmlShoppingConfirm(Request $request, Response $response, $Payment){

        $crawler = new Crawler($response->getContent());
        $html = $this->getHtml($crawler);
        // for criptmall
        $newMethod = $Payment->getMethod() . ' で支払いへ';
        //$newMethod = 'ビットコインで支払いへ';
        try {
            $listOldVersion = array('3.0.1', '3.0.2', '3.0.3', '3.0.4');
            if (in_array(Constant::VERSION, $listOldVersion)) {
                $oldMethod = $crawler->filter('.btn.btn-primary.btn-block')->html();
            }else{
                $oldMethod = $crawler->filter('#order-button')->html();
            }

            $html = str_replace($oldMethod, $newMethod, $html);
        } catch (\InvalidArgumentException $e) {
        }
        return html_entity_decode($html, ENT_NOQUOTES, 'UTF-8');
    }

    public function onRenderZaifPaymentShoppingCompleteBefore(FilterResponseEvent $event)
    {
    }

    public function onControllerZaifPaymentShoppingConfirmBefore() {
        $logger = $this->app['monolog.zaif.payment'];
        $nonMember = $this->app['session']->get('eccube.front.shopping.nonmember');
        if ($this->app->isGranted('ROLE_USER') || !is_null($nonMember)) {
            $Order = $this->app['eccube.repository.order']->findOneBy(array('pre_order_id' => $this->app['eccube.service.cart']->getPreOrderId()));
        
            $listOldVersion = array('3.0.1', '3.0.2', '3.0.3', '3.0.4');
            if (in_array(Constant::VERSION, $listOldVersion)) {
                $form = $this->app['form.factory']->createBuilder('shopping')->getForm();
                $deliveries = $this->findDeliveriesFromOrderDetails($this->app, $Order->getOrderDetails());
                // 配送業社の設定
                $shippings = $Order->getShippings();
                $delivery = $shippings[0]->getDelivery();

                // Formのカスタマイズ
                $this->setFormDelivery($form, $deliveries, $delivery);           // 配送業社の設定
                $this->setFormDeliveryDate($form, $Order, $this->app);           // お届け日の設定
                $this->setFormDeliveryTime($form, $delivery);                    // お届け時間の設定
                $this->setFormPayment($form, $delivery, $Order->getPayment());   // 支払い方法選択
            } else {
                $form = $this->app['eccube.service.shopping']->getShippingForm($Order);
            }

            if ('POST' === $this->app['request']->getMethod()) {
                $form->handleRequest($this->app['request']);

                if ($form->isValid()) {
                    $formData = $form->getData();
                    if (in_array(Constant::VERSION, $listOldVersion)) {
                        $this->app['session']->set('zaif_payment_formData', $formData);
                    }

                    $em = $this->app['orm.em'];
                    $currencies = $em->getRepository('\Plugin\ZaifPayment\Entity\ZaifPayment')->find(array('mainkey'=>'currencies','subkey'=>''));
                    $currencies = unserialize($currencies->getValue());

                    $this->app['eccube.service.order']->setOrderUpdate($this->app['orm.em'], $Order, $formData);
                    $Order->setOrderStatus($this->app['eccube.repository.order_status']->find($this->app['config']['order_processing']));
                    
                    $this->app['orm.em']->persist($Order);
                    $this->app['orm.em']->flush();
                    
                    # for criptomall
                    if($Order->getPaymentMethod() == "cyptomall token [XMALL]") {
                        header("Location: " . $this->app->url('cm_xmall_payment'));
                        exit;
                      }
                    if($Order->getPaymentMethod() == "bitcoin [BTC]") {
                      header("Location: " . $this->app->url('cm_btc_payment'));
                        exit;
                      }
                      
                    if($Order->getPaymentMethod() == "ethereum [ETH]") {
                      header("Location: " . $this->app->url('cm_btc_payment'));
                        exit;
                      }
                      
                      if($Order->getPaymentMethod() == "bitcoin cash [BCH]") {
                      header("Location: " . $this->app->url('cm_btc_payment'));
                        exit;
                      }

                    foreach($currencies->return as $symbol => $name) {
                      if($Order->getPaymentMethod() == $name." [Zaif決済]") {
                          header("Location: " . $this->app->url('zaif_'.$symbol.'_payment'));
                          exit;
                        }
                    }
                }
            }
        }
    }
	
	   /**
     * @param EventArgs $event
     * 「受注確認メール」にて文言置換により仮想通貨金額を出力
     */
    public function onMail(EventArgs $event)
    {
			// 海外情報入力プラグインが有効化されていない場合は何もしない
			$Plugin = $this->app['eccube.repository.plugin']->findOneBy(
				array(
					'code' => 'OverseasAddress',
					'del_flg' => Constant::DISABLED,
					'enable' => Constant::ENABLED
				)
			);
			if(is_null($Plugin)) {
				return false;
			}
			
			// メール置換実行
			$helper = new ServiceMail();
			$helper->sendCoinMail($event);
    }

	
    public static function getHtml(Crawler $crawler){
        $html = '';
        foreach ($crawler as $domElement) {
            $domElement->ownerDocument->formatOutput = true;
            $html .= $domElement->ownerDocument->saveHTML();
        }
        return html_entity_decode($html, ENT_NOQUOTES, 'UTF-8');
    }
}

<?php

namespace Plugin\AffiliatesPoint;

use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Entity\Category;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;

use Plugin\AffiliatesPoint\Entity\PointHistory;
use Plugin\AffiliatesPoint\Entity\PointRate;
use Plugin\AffiliatesPoint\Entity\UserInfo;

use Symfony\Component\HttpFoundation\Response;

class AffiliatesPointEvent
{
    /** @var \Eccube\Application $app */
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function onOrderIndexInit(EventArgs $event)
    {
//    	var_dump("Order Index");
//    	var_dump($event);  
    }
   
   /*  アフィリエイトコミッション 付与・取り消し  */
    public function  onOrderEditIndexComplete(EventArgs $event)
   {

    var_dump("Order Edit Finish");   
    
    ob_start();
    dump($event);
    $result =ob_get_contents();
    ob_end_clean();
    $fp = fopen("./dump.html", "w" );
    fputs($fp, $result);
    fclose( $fp );

        
    $Customer = $event->getArgument('Customer')->getId();
    $Order = $event->getArgument('TargetOrder')->getId(); 
    $OrderStatus = $event->getArgument('TargetOrder')->getOrderStatus()->getId(); 
     
 
            
    $fp = fopen("./dump1.txt", "w" );
    fwrite($fp, $Customer);
    fwrite($fp, "\n");
    fwrite($fp, $Order."\n"); 
    fwrite($fp, $OrderStatus."\n"); 
    fclose( $fp );
           
    }    

    /*  各Controller の initial point のフックポイントが効いているかどうかのチェック */
     public function onMypageMypage(EventArgs $event)
    {
         dump('Mypage');  // ok (ご注文履歴）
    }
    
     public function onMypageFavorite(EventArgs $event)
    {
        dump('Favorite');   // ok
    }
    public function onMypageChange(EventArgs $event)
    {
        dump('Change');  // ok
    } 
    
     public function onMypageDelivery(EventArgs $event)
    {
        dump('Delivery');     // NG
    }
    
    public function onMypageWithdraw(EventArgs $event)
    {
        dump('Withdraw');  // ok
    }
    
        
     /*  navi.twig を navi_affi.twig に置き換えるメソッド */
    public function onRenderMypageNaviAffi(TemplateEvent $event)
    {
var_dump("Show Affil Menu");
        $sourceOrigin = $event->getSource();
        $search = " {% include 'Mypage/navi.twig' %}";
        $replace = " {% include 'AffiliatesPoint/Resource/template/navi_affil.twig' %}";

        $source = str_replace($search, $replace, $sourceOrigin);
        $event->setSource($source);
    }
    
    public function onRenderMypageNaviAffi2(TemplateEvent $event)
    {
var_dump("Show Affil Menu2");
        $sourceOrigin = $event->getSource();
        $search = " {{ include('Mypage/navi.twig') }}";
        $replace = " {{ include('AffiliatesPoint/Resource/template/navi_affil.twig') }}";

        $source = str_replace($search, $replace, $sourceOrigin);
        $event->setSource($source);
    }    
    /* Hook points on navi.twig ?   -> NG   */
    public function onMypageNavi(TemplateEvent $event)
    {
    	var_dump($event);
    }
}

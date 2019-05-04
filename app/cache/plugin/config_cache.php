<?php return array (
  'AffiliatesPoint' => 
  array (
    'config' => 
    array (
      'name' => 'AffiliatesPoint',
      'code' => 'AffiliatesPoint',
      'version' => '1.0.0',
      'orm.path' => 
      array (
        0 => '/Resource/doctrine',
      ),
      'event' => 'AffiliatesPointEvent',
    ),
    'event' => 
    array (
      'admin.order.edit.index.complete' => 
      array (
        0 => 
        array (
          0 => 'onOrderEditIndexComplete',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/index.twig' => 
      array (
        0 => 
        array (
          0 => 'onRenderMypageNaviAffi',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/favorite.twig' => 
      array (
        0 => 
        array (
          0 => 'onRenderMypageNaviAffi',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/change.twig' => 
      array (
        0 => 
        array (
          0 => 'onRenderMypageNaviAffi',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/delivery.twig' => 
      array (
        0 => 
        array (
          0 => 'onRenderMypageNaviAffi2',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/delivery_edit.twig' => 
      array (
        0 => 
        array (
          0 => 'onRenderMypageNaviAffi2',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/withdraw.twig' => 
      array (
        0 => 
        array (
          0 => 'onRenderMypageNaviAffi',
          1 => 'NORMAL',
        ),
      ),
      'Mypage/navi.twig' => 
      array (
        0 => 
        array (
          0 => 'onMypageNavi',
          1 => 'NORMAL',
        ),
      ),
    ),
  ),
  'CategoryContent' => 
  array (
    'config' => 
    array (
      'name' => 'カテゴリコンテンツプラグイン',
      'code' => 'CategoryContent',
      'version' => '1.0.0',
      'orm.path' => 
      array (
        0 => '/Resource/doctrine',
      ),
    ),
    'event' => NULL,
  ),
  'ZaifPayment' => 
  array (
    'config' => 
    array (
      'name' => 'Zaif決済プラグイン',
      'event' => 'ZaifPaymentEvent',
      'code' => 'ZaifPayment',
      'version' => '1.0.0',
      'service' => 
      array (
        0 => 'ZaifPaymentServiceProvider',
      ),
      'orm.path' => 
      array (
        0 => '/Resource/doctrine',
      ),
    ),
    'event' => 
    array (
      'eccube.event.render.shopping.before' => 
      array (
        0 => 
        array (
          0 => 'onRenderZaifPaymentShoppingBefore',
          1 => 'NORMAL',
        ),
      ),
      'eccube.event.render.shopping_complete.before' => 
      array (
        0 => 
        array (
          0 => 'onRenderZaifPaymentShoppingCompleteBefore',
          1 => 'NORMAL',
        ),
      ),
      'eccube.event.controller.shopping_confirm.before' => 
      array (
        0 => 
        array (
          0 => 'onControllerZaifPaymentShoppingConfirmBefore',
          1 => 'NORMAL',
        ),
      ),
      'eccube.event.render.admin_order_edit.before' => 
      array (
        0 => 
        array (
          0 => 'onAdminOrderEditZaifPaymentInitialize',
          1 => 'NORMAL',
        ),
      ),
      'mail.order' => 
      array (
        0 => 
        array (
          0 => 'onMail',
          1 => 'NORMAL',
        ),
      ),
      'mail.admin.order' => 
      array (
        0 => 
        array (
          0 => 'onMail',
          1 => 'NORMAL',
        ),
      ),
    ),
  ),
);
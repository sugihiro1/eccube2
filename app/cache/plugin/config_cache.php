<?php return array (
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
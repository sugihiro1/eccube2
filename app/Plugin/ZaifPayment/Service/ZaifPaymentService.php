<?php

namespace Plugin\ZaifPayment\Service;

use Eccube\Application;

class ZaifPaymentService
{
  private $app;
  
  public function __construct(Application $app)
  {
    $this->app = $app;
    $this->Order = $app['eccube.repository.order']->findOneBy(array('pre_order_id' => $app['eccube.service.cart']->getPreOrderId()));
    $order_payment_method = $this->Order->getPaymentMethod();  // 支払方法
    $this->order_note = $this->Order->getNote();  // note
    
    // ※'dtb_order'テーブルの'paymet_method'カラムに入っている文字列を分解して通貨記号(BTCやBCHなど)を取得
    if(isset($order_payment_method)) {
      $match_symbol = NULL;
      preg_match('/.+\[([A-Z]+)\]/', $order_payment_method, $match_symbol);
      if (count($match_symbol) > 1) $this->symbol = $match_symbol[1];
    }
  }
  
  public function getOrderPaymentSymbol()
  {
    return $this->symbol;
  }
  
  public function getOrderNoteAmount()
  {
    $amount = NULL;
    if(isset($this->order_note)) {
      if(isset($this->symbol)) {
        //「Amount_[仮想通貨記号]:」のあとにつづく文字列を正規表現で取得
        $match_amount = NULL;
        preg_match("/Amount_{$this->symbol}:\s?(.*)/", $this->order_note, $match_amount);
        if (count($match_amount) > 1) $amount = $match_amount[1];
      }

      // 支払金額が取得できていない場合（つまり「Amount_[仮想通貨記号]:」による記載がない、旧仕様の場合を想定）
      if (empty($amount)) {
        //「Amount:」のあとにつづく文字列を正規表現で取得
        $match_amount = NULL;
        preg_match('/Amount:\s?(.*)/', $this->order_note, $match_amount);
        if (count($match_amount) > 1) $amount = $match_amount[1];
      }
    }
    return $amount;
  }

  public function getOrderNoteRate()
  {
    $rate = NULL;
    if(isset($this->order_note)) {
      if(isset($this->symbol)) {
        //「Rate_[仮想通貨記号]:」のあとにつづく文字列を正規表現で取得
        $match_rate = NULL;
        preg_match("/Rate_{$this->symbol}:\s?(.*)/", $this->order_note, $match_rate);
        if (count($match_rate) > 1) $rate = $match_rate[1];
      }
      
      // 支払金額が取得できていない場合（つまり「Rate_[仮想通貨記号]:」による記載がない、旧仕様の場合を想定）
      if (empty($rate)) {
        //「Rate:」のあとにつづく文字列を正規表現で取得
        $match_rate = NULL;
        preg_match('/Rate:\s?(.*)/', $this->order_note, $match_rate);
        if (count($match_rate) > 1) $rate = $match_rate[1];
      }
    }
    return $rate;
  }
}

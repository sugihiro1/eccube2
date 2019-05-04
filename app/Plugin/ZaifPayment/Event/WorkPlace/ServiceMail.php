<?php
/*
 * This file is part of the ZaifPayment
 *
 * Copyright (C) 2019 yohta
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ZaifPayment\Event\WorkPlace;

use Eccube\Event\EventArgs;
use Eccube\Entity\Customer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * フックポイント汎用処理具象クラス
 *  - 拡張元 : パスワードリセットメール、パスワードリセット完了メール
 *  - 拡張項目 : メール内容
 * Class ServiceMail
 *
 * @package Plugin\ZaifPayment\Event
 */
class ServiceMail extends AbstractWorkPlace
{
	/**
	 * メール件名及び本文の置き換え
	 *
	 * @param EventArgs $event
	 * @return bool
	 */
	public function sendCoinMail(EventArgs $event)
	{
		$ZaifPaymentRepository = $this->app['eccube.plugin.service.zaif_payment'];
		
		$symbol = $ZaifPaymentRepository->getOrderPaymentSymbol();
		$amount = $ZaifPaymentRepository->getOrderNoteAmount();
		$rate = $ZaifPaymentRepository->getOrderNoteRate();
		
		// 支払額取得判定
		if (empty($symbol) || empty($amount) || empty($rate)) {
			return false;
		}
		
		// 基本情報の取得
		$message = $event->getArgument('message');
		
		// 必要情報判定
		if (empty($message)) {
			return false;
		}
		// メールボディ取得
		$body = $message->getBody();
		
		
		/**
		* 【メモ：置換用配列変数のルール・仕様】
		* 
		* ① 'regex'がtrueである場合、正規表現での置換、falseである場合は通常の文字列置換をします
		*   （※ 正規表現での置換処理（ preg_replace() ）が結構負荷が重いようだったので、
		*   なるべく負荷を減らそうとこのような仕様にしました）
    * 
		* ② 'search' を 'replace' に置換します
		* 
		* ③ 上から順番に置換処理が行われます。
		*    なので、なるべく上の方に【文章】、下の方に【単語】や【短い汎用的な文章】を記述する必要があります。
		*
		* ④ 「メール翻訳プラグイン」においても、同様に文字列置換処理が行われており、どちらが先に実行されるかは想定できません。よって、検索文字列に関しては日・英双方の記述で置換する必要があります。
		*
		**/
		
		// [本文]置換用文字列定義変数
		$replace_arr_txt = array (
			array(
				'regex' => false,
				'search' => 'getAmount',
				'replace' => $amount
			)
		);
		// [本文]文字列置換実行
		foreach($replace_arr_txt as $rep) {
			if( $rep['regex'] ) {
				$body = preg_replace("#{$rep['search']}#u", $rep['replace'], $body);
			} else {
				$body = str_replace($rep['search'], $rep['replace'], $body);
			}
		}
		
		// 単価の文字列置換
		/**
		* メモ：
		* twigの記述によって「getUnit-[日本円単価]」の形で出力されているものを、dtb_orderのnoteのrateから計算して仮想通貨での金額を出したうえで文字列置換する
		**/
		$body = preg_replace_callback("#getUnit-(\d*)#u", function($m) use ($rate, $symbol){return number_format((integer)$m[1]/(integer)$rate,5) . ' ' . $symbol;}, $body);

		// メッセージにメールボディをセット
		$message->setBody($body);
	}
}

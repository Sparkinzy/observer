<?php
/**
 * Created by PhpStorm.
 * User: mu
 * Date: 2019-12-13
 * Time: 16:57
 */
include __DIR__ . '/../vendor/autoload.php';

foreach (glob(__DIR__ . '/Observers/*/*Observer.php') as $file)
{
	include $file;
}

use Mu\Observer\Facades\Subject;

class Order {
	/**
	 * @param $trade_id
	 */
	public function delivery(int $trade_id)
	{
		$rs = $this->mock_update($trade_id);
		
		$order        = $this->get_order($trade_id);
		$orderSubject = new Subject($order);
		if ($rs['code'] === 0)
		{
			$orderSubject->attach(new NotifySellerObserver());
			$orderSubject->attach(new NotifyTaobaoObserver());
			$orderSubject->notify();
		}
		
	}
	
	/**
	 *
	 * 标记更新
	 *
	 * @param $trade_id
	 *
	 * @return array
	 */
	private function mock_update($trade_id)
	{
		return ['code' => 0, 'msg' => 'ok', 'data' => ['trade_ide' => $trade_id]];
	}
	
	/**
	 *
	 * 获取订单数据
	 *
	 * @param $trade_id
	 *
	 * @return array
	 */
	private function get_order($trade_id)
	{
		return [
			'id'              => $trade_id,
			'receiver_name'   => '系统',
			'receiver_mobile' => '18982949731'
		];
	}
}

$order = new Order();
$order->delivery(123123);
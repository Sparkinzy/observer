<?php
/**
 * Created by PhpStorm.
 * User: mu
 * Date: 2019-12-13
 * Time: 17:02
 */
use Mu\Observer\Facades\Observer;
class NotifyTaobaoObserver extends Observer
{
	public function handle()
	{
		// TODO: Implement handle() method.
		
		echo '通知淘宝发货',PHP_EOL;
		echo json_encode($this->getData(),JSON_UNESCAPED_UNICODE),PHP_EOL;
	}
}
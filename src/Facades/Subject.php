<?php
/**
 * Created by PhpStorm.
 * User: mu
 * Date: 2019-12-13
 * Time: 15:36
 */

namespace Mu\Observer\Facades;

use Mu\Observer\Constacts\SubjectInterface;

class Subject implements SubjectInterface {
	/**
	 * 所有观察者
	 * @var array
	 */
	private $observers = [];
	/**
	 * 观察者中会用到的数据:object
	 * @var mixed
	 */
	private $data;
	
	public function __construct($object)
	{
		if (empty($object))
		{
			$this->data = new \stdClass();
		}
		if (is_array($object))
		{
			$this->data = json_decode(json_encode($object));
		}
	}
	
	/**
	 * 添加观察者
	 *
	 * @param Observer $observer
	 */
	public function attach(Observer $observer)
	{
		$observer->setData($this->data);
		$this->observers[] = $observer;
	}
	
	/**
	 * 移除观察者
	 *
	 * @param Observer $observer
	 *
	 * @return bool
	 */
	public function detach(Observer $observer)
	{
		$index = array_search($observer, $this->observers);
		if ($index === false || ! array_key_exists($index, $this->observers))
		{
			return false;
		}
		unset($this->observers[$index]);
		return true;
	}
	
	/**
	 * 当被观察者发生变化时，通知所有观察者
	 */
	public function notify()
	{
		foreach ($this->observers as $observer)
		{
			$observer->handle();
		}
	}
	
}
<?php
/**
 * Created by PhpStorm.
 * User: mu
 * Date: 2019-12-13
 * Time: 13:28
 */

namespace Mu\Observer;

use Mu\Observer\Constacts\ObserverInterface;

/**
 * 被观察者
 * Class SubjectInterface
 * @package Mu\Observer
 */
class Subject {
	
	private $state;
	
	private $observers = [];
	
	public function getState()
	{
		return $this->state;
	}
	
	public function setState($state)
	{
		$this->state = $state;
		$this->notify();
	}
	
	public function attach(ObserverInterface $object)
	{
		$this->observers[] = $object;
	}
	
	public function detach(ObserverInterface $object)
	{
		foreach ($this->observers as $key => $observer)
		{
			if ($object == $observer)
			{
				unset($this->observers[$key]);
			}
		}
	}
	
	public function notify()
	{
		foreach ($this->observers as $observer)
		{
			$observer->update();
		}
	}
}
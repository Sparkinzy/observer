<?php
/**
 * Created by PhpStorm.
 * User: mu
 * Date: 2019-12-13
 * Time: 17:19
 */

namespace Mu\Observer\Facades;

use Mu\Observer\Constacts\ObserverInterface;

class Observer implements ObserverInterface {
	
	private $object;
	
	public function setData($data)
	{
		$this->object = $data;
	}
	
	public function getData()
	{
		return $this->object;
	}
	
	public function handle()
	{
		// TODO: Implement handle() method.
	}
}
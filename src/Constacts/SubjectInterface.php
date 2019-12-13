<?php
/**
 * Created by PhpStorm.
 * User: mu
 * Date: 2019-12-13
 * Time: 15:12
 */

namespace Mu\Observer\Constacts;

use Mu\Observer\Facades\Observer;

/**
 * 被观察者 - 导演 - 船长 - 发布命令者
 * Interface SubjectInterface
 * @package Mu\Observer\Constacts
 */
interface SubjectInterface {
	
	public function __construct($object);
	public function attach(Observer $observer); // 添加观察者对象
	public function detach(Observer $observer); // 删除观察者对象
	public function notify(); // 通知观察者执行相应功能
}
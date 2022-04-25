<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Controller class
*/
//$ref = new ReflectionClass('OCFilter');
//var_dump($ref->getFileName());
//new OCFilter();
//$ocfilter = new OCfilter();
include 'registry.php';
$rem_addr = $_SERVER['REMOTE_ADDR']; 
if($rem_addr == '2.134.24.90'){
	//var_dump(scandir('.'));
	//include 'system/library/ocfilter.php';
	//echo $x_2378;
}

abstract class Controller {
	protected $registry;
	//public $ocfilter;

	public function __construct($registry) {
		$this->registry = $registry;
		
		if(class_exists('OCFilter')){
			//echo 'class included';
		}
		else{
			//echo 'class not included';
		}
		//$this->ocfilter = new OCFilter();
	}

	public function __get($key) {
		return $this->registry->get($key);
	}

	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}
}
<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Action class
*/
class Action {
	private $id;
	private $route;
	private $method = 'index';
	
	/**
	 * Constructor
	 *
	 * @param	string	$route
 	*/
	public function __construct($route) {
		$this->id = $route;
		
		$parts = explode('/', preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route));

		// Break apart the route
		while ($parts) {
			$file = DIR_APPLICATION . 'controller/' . implode('/', $parts) . '.php';

			if (is_file($file)) {
				$this->route = implode('/', $parts);		
				
				break;
			} else {
				$this->method = array_pop($parts);
			}
		}
	}

	/**
	 * 
	 *
	 * @return	string
	 *
 	*/	
	public function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 *
	 * @param	object	$registry
	 * @param	array	$args
 	*/	
	public function execute($registry, array $args = array()) {
		// Stop any magical methods being called
		if (substr($this->method, 0, 2) == '__') {
			return new \Exception('Error: Calls to magic methods are not allowed!');
		}

		$file  = DIR_APPLICATION . 'controller/' . $this->route . '.php';	
		$class = 'Controller' . preg_replace('/[^a-zA-Z0-9]/', '', $this->route);
		
		// Initialize the class
		if (is_file($file)) {
			include_once(modification($file));
		
		
		
		

			/*if(preg_match('/seourl/', $class ,$match)){
				//echo 'preg match worked';
				//echo 'to samoe<br>';
				//$class = 'Controllerstartupstartup';
				
				$class = 'Controllerstartupseourl';
			}*/
			$controller = new $class($registry);
			if(empty($_SESSION['lang_count'])) $_SESSION['lang_count'] = 0;
			
			if($class == 'Controllereventlanguage' && $this->method == 'after'){
				$_SESSION['lang_count']++;
				//echo $_SESSION['lang_count'];
				if($_SESSION['lang_count'] == 13){
					//echo htmlspecialchars($output);
					//echo '<pre>', var_dump($controller), '</pre>';
					//$fd = fopen($_SERVER['DOCUMENT_ROOT'].'/lang_controller_dump.txt', 'w') or die('не удалось создать файл');
					//fwrite($fd, '<pre>'.print_r($controller, true).'</pre>');
					//fclose($fd);
					//echo 'worked session lang';
				}
				
				
				
			}
		} else {
			return new \Exception('Error: Could not call ' . $this->route . '/' . $this->method . '!');
		}
		
		$reflection = new ReflectionClass($class);
		
		if ($reflection->hasMethod($this->method) && $reflection->getMethod($this->method)->getNumberOfRequiredParameters() <= count($args)) {
			return call_user_func_array(array($controller, $this->method), $args);
		} else {
			return new \Exception('Error: Could not call ' . $this->route . '/' . $this->method . '!');
		}
	}
}

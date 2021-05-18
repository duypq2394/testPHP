<?php
namespace App\Controllers;

use App\Config\Smarty\SmartyTemplate;

abstract class BaseController {

	protected $url;
	protected $action;

	function __construct($url, $action){
		$this->url = $url;
		$this->action = $action;
		$this->tpl = new SmartyTemplate;
	}

	function executeAction(){
		if(!empty($this->action)) return $this->{$this->action}();
	}

	function excView( $viewName ){
		$view_file = __DIR__ . DIRECTORY_SEPARATOR . 'Views' . get_class($this) . DIRECTORY_SEPARATOR . $viewName .'.php';
		if(file_exists($view_file)) {
			require_once($view_file);
		} else {
			throw new Exception('View not found');
		}
	}
}

?>
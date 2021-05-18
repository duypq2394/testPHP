<?php
namespace App\Controllers;

class Home extends BaseController{

	function index() {
		$this->tpl->assign('header', "Welcome Home 123444");
		$this->tpl->display('home/index.tpl');
	}
}
?>
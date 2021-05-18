<?php
ini_set('display_errors', 1);

// Autoloading with + without Composer

// Without
// require_once('loader.php');
// require_once('constants.php');

// $test = new Test;

// With
require_once('../vendor/autoload.php');
require_once('./Loader.php');
// $test = new \App\Classes\Test;

//Load Smarty
require_once('./smarty/Smarty.class.php');
$expected_controllers = array ( 'index', 'home');

if(!empty($_GET)) {
	if(in_array($_GET['controller'], $expected_controllers )) {
		$controller = new loader($_GET);
		$controller = $controller->createController();
		$controller->executeAction();
	}
}
?>
<?php
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', 1);

require_once('../vendor/autoload.php');
require_once('./Loader.php');

//Load Smarty
require_once('./smarty/Smarty.class.php');

$controller = new loader($_GET);
$controller = $controller->createController();
$controller->executeAction();
?>
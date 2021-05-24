<?php
/* Smarty version 3.1.39, created on 2021-05-24 06:03:12
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60ab25802febc3_54031788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcb8cd219c941ca351c2fae1ad834ae67427eef7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\home.tpl',
      1 => 1621828987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ab25802febc3_54031788 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Tên tôi là: <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
, năm nay tôi <?php echo $_smarty_tpl->tpl_vars['data']->value['age'];?>
 tuổi</h1>
</body>
</html><?php }
}

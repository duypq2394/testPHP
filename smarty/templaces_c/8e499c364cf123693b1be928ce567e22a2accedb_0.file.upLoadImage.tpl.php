<?php
/* Smarty version 3.1.39, created on 2021-06-02 05:02:06
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\upLoadImage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b6f4ae436248_13628366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e499c364cf123693b1be928ce567e22a2accedb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\upLoadImage.tpl',
      1 => 1622523149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b6f4ae436248_13628366 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="" method="post" enctype="multipart/form-data">
    <label for="file">ファイル名: </label>
    <input type="file" name="file" id="file"><br/>
    <input type="submit" name="submit" value="submit">
</form><?php }
}

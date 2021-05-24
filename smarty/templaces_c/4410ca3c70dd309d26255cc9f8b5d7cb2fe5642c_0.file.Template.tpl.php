<?php
/* Smarty version 3.1.39, created on 2021-05-24 08:07:38
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\Template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60ab42aa13bb23_47608875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4410ca3c70dd309d26255cc9f8b5d7cb2fe5642c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\Template.tpl',
      1 => 1621831027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ab42aa13bb23_47608875 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type='text/css' href="Styles/Stylesheet.css" />
</head>

<body>
    <div id="wrapper">
        <div id="banner">
        </div>

        <nav id="navigation">
            <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="Coffee.php">Coffee</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="Management.php">Management</a></li>
            </ul>
        </nav>

        <div id="content_area">
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div>
        <div id="sidebar">

        </div>

        <footer>
            <p>All rights reserved</p>
        </footer>
    </div>
</body>

</html><?php }
}

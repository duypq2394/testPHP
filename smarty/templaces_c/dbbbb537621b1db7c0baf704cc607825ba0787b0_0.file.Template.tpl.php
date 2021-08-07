<?php
/* Smarty version 3.1.39, created on 2021-08-06 10:55:51
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/Template.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610cf917295bd9_95139917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbbbb537621b1db7c0baf704cc607825ba0787b0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/Template.tpl',
      1 => 1628232126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610cf917295bd9_95139917 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type='text/css' href="Styles/Stylesheet.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="Styles/fixed_midashi.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    <?php echo '</script'; ?>
>
</head>

<body>
    <div id="wrapper">
        <div id="banner">
        </div>

        <nav id="navigation">
            <ul id="nav">
                <li><b><a href="?action=index">ホーム</a></b></li>
                <li><b><a href="?action=coffee">製品の紹介</a></b></li>
                <li><b><a href="?action=shop">ショップ</a></b></li>
                                <li><b><a href="?action=contact">連絡</a></b></li>
                <li><b><a href="?action=management">管理</a></b></li>
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

</html>
<?php echo '<script'; ?>
>
    function show_confirm(name){
        return confirm(name + "を削除してもよろしですか？");
    }
<?php echo '</script'; ?>
><?php }
}

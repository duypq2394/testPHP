<?php
/* Smarty version 3.1.39, created on 2021-05-31 03:27:00
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\coffeeDropdownlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b43b64d52e39_77480063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50b0763e24551954599d6fff5c6854d7fc6c67a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\coffeeDropdownlist.tpl',
      1 => 1622424282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b43b64d52e39_77480063 (Smarty_Internal_Template $_smarty_tpl) {
?><form action = '' method = 'post' width = '200px'>
    コーヒーのタイプをお選びください: 
    <select name = 'types' >
    <option value = '%' >All</option>
     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['valueArry']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
        <option value = '<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <input type = 'submit' value = '検索' />
</form><?php }
}

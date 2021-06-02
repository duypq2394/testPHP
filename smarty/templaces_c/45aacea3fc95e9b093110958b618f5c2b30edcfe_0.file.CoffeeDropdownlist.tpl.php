<?php
/* Smarty version 3.1.39, created on 2021-06-02 04:54:47
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\CoffeeDropdownlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b6f2f70e4824_28746563',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45aacea3fc95e9b093110958b618f5c2b30edcfe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\CoffeeDropdownlist.tpl',
      1 => 1622602276,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b6f2f70e4824_28746563 (Smarty_Internal_Template $_smarty_tpl) {
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

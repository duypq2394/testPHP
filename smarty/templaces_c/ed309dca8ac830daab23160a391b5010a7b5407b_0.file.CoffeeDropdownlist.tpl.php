<?php
/* Smarty version 3.1.39, created on 2021-08-07 05:22:12
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/CoffeeDropdownlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610dfc64a1d691_42547534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed309dca8ac830daab23160a391b5010a7b5407b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/CoffeeDropdownlist.tpl',
      1 => 1628079830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610dfc64a1d691_42547534 (Smarty_Internal_Template $_smarty_tpl) {
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
    <input type = 'submit' formaction='?action=coffee' value = '検索' />
</form><?php }
}

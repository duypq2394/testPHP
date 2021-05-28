<?php
/* Smarty version 3.1.39, created on 2021-05-27 10:29:34
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\coffeeList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60af586e64da80_88904924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a7c0e7f6d8417cf53a6c1c3b97d8242dfccb2b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\coffeeList.tpl',
      1 => 1622104173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60af586e64da80_88904924 (Smarty_Internal_Template $_smarty_tpl) {
?><form id = "outer" >
<div>
<input type="submit" name="btn_submit" value="Order">
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['coffeeArray']->value, 'coffee');
$_smarty_tpl->tpl_vars['coffee']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['coffee']->value) {
$_smarty_tpl->tpl_vars['coffee']->do_else = false;
?>
    <div id = "inner">
        <th rowspan='6' width = '150px' ><img id="productsImage" runat = 'server' src = '<?php echo $_smarty_tpl->tpl_vars['coffee']->value->image;?>
' /></th>
        <p id="productsName" ><?php echo $_smarty_tpl->tpl_vars['coffee']->value->name;?>
</td>
        <p id="productsPrice"><?php echo $_smarty_tpl->tpl_vars['coffee']->value->price;?>
</p>
        <input type="number" min="0" max="20" name="numberOrder" size="30" value="0">
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</form><?php }
}

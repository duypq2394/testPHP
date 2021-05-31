<?php
/* Smarty version 3.1.39, created on 2021-05-31 04:15:16
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b446b49d3890_79409764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd487e73f1c65cd9ed065ed439846cec64b1f55dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\products.tpl',
      1 => 1622427312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b446b49d3890_79409764 (Smarty_Internal_Template $_smarty_tpl) {
?><form action = '' method = 'post' >
<?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
    <h4 style="color:red">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </h4>
<?php }?>
<table>
    <tr style = "color: #3a3427">
        <td><b>名前</b></td>
        <td><b>携帯電話番号</b></td>
        <td></td>
    </tr>
    <tr>
        <td><input type="text" id="name" name="customerName" ></td>
        <td><input type="tel" id="phone" name="phoneNumber" ></td>
        <td><input type = 'submit' value = 'Order' /></td>


    </tr>
</table>

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
</p>
        <p id="productsPrice"><?php echo $_smarty_tpl->tpl_vars['coffee']->value->price;?>
</p>
        <input type="hidden" name="txtName[]" value='<?php echo $_smarty_tpl->tpl_vars['coffee']->value->name;?>
'/>
        <input type="hidden" name="price[]" value='<?php echo $_smarty_tpl->tpl_vars['coffee']->value->price;?>
'/>
        <input type="number" min="0" max="20" name="numberOrder[]" size="30" value="0">
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</form><?php }
}

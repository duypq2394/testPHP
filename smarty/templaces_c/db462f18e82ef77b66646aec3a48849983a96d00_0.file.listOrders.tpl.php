<?php
/* Smarty version 3.1.39, created on 2021-06-02 05:06:29
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\listOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b6f5b58abb72_50820001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db462f18e82ef77b66646aec3a48849983a96d00' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\listOrders.tpl',
      1 => 1622602216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b6f5b58abb72_50820001 (Smarty_Internal_Template $_smarty_tpl) {
?><table class='overViewTable'>
    <tr>
        <td><b>名前</b></td>
        <td><b>携帯電話番号</b></td>
        <td><b>注文</b></td>
        <td><b>合計金額</b></td>
        <td><b>日付</b></td>
        <td></td>
    </tr>
        <form action = '' method = 'post'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderArray']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->clientName;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->clientPhoneNumber;?>
</td>    
                <td style="white-space: pre-line"><?php echo $_smarty_tpl->tpl_vars['value']->value->orderContent;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</td>  
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->orderDate;?>
</td>
                <td><button name="finish" type="submit" value=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
 onclick="return show_confirm();">完了 </button></td>  
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </form>
   
</table><?php }
}

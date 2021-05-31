<?php
/* Smarty version 3.1.39, created on 2021-05-31 03:28:50
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\orderList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b43bd298ea42_25205955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d19d795a739145f241e62ac7de4740eb98cd995' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\orderList.tpl',
      1 => 1622389481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b43bd298ea42_25205955 (Smarty_Internal_Template $_smarty_tpl) {
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

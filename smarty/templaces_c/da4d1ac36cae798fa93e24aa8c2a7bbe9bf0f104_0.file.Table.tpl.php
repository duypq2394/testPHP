<?php
/* Smarty version 3.1.39, created on 2021-05-25 12:22:23
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\Table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60accfdfab4687_27598427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da4d1ac36cae798fa93e24aa8c2a7bbe9bf0f104' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\Table.tpl',
      1 => 1621938081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60accfdfab4687_27598427 (Smarty_Internal_Template $_smarty_tpl) {
?><table class='overViewTable'>
    <tr>
        <td></td>
        <td></td>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Type</b></td>
        <td><b>Price</b></td>
        <td><b>Roast</b></td>
        <td><b>Country</b></td>
    </tr>
        <form action = '' method = 'post'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['coffeeArray']->value, 'value');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <tr>
                <td><button name="update" type="submit" value=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
 formaction="coffeeUpdate">Update</button></td>
                <td><button name="delete" type="submit" value=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
 onclick="return show_confirm();">Delete</button></td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->type;?>
</td>    
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</td> 
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->roast;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->country;?>
</td>   
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </form>
   
</table><?php }
}

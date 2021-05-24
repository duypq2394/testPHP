<?php
/* Smarty version 3.1.39, created on 2021-05-24 12:22:32
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\coffeeTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60ab7e681af291_43527701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48677f5d698a6f66a69decc0bc0b18d745f268fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\coffeeTable.tpl',
      1 => 1621851749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ab7e681af291_43527701 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['coffeeArray']->value, 'coffee');
$_smarty_tpl->tpl_vars['coffee']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['coffee']->value) {
$_smarty_tpl->tpl_vars['coffee']->do_else = false;
?>
    <table class = 'coffeeTable'>
        <tr>
            <th rowspan='6' width = '150px' ><img runat = 'server' src = '<?php echo $_smarty_tpl->tpl_vars['coffee']->value->image;?>
' /></th>
            <th width = '75px' >Name: </th>
            <td><?php echo $_smarty_tpl->tpl_vars['coffee']->value->name;?>
</td>
        </tr>
                            
        <tr>
            <th>Type: </th>
            <td><?php echo $_smarty_tpl->tpl_vars['coffee']->value->type;?>
</td>
        </tr>
                            
        <tr>
            <th>Price: </th>
            <td><?php echo $_smarty_tpl->tpl_vars['coffee']->value->price;?>
</td>
        </tr>
                            
        <tr>
            <th>Roast: </th>
            <td><?php echo $_smarty_tpl->tpl_vars['coffee']->value->roast;?>
</td>
        </tr>
                            
        <tr>
            <th>Origin: </th>
            <td><?php echo $_smarty_tpl->tpl_vars['coffee']->value->country;?>
</td>
        </tr>
                            
        <tr>
            <td colspan='2' ><?php echo $_smarty_tpl->tpl_vars['coffee']->value->review;?>
</td>
        </tr>           
    </table>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}

<?php
/* Smarty version 3.1.39, created on 2021-08-07 05:23:11
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/Table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610dfc9f29e683_94941338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d03da948834547f81181412f5778dc25078d027' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/Table.tpl',
      1 => 1628097034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610dfc9f29e683_94941338 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <form action='' method = 'post'>
    <button name="downloadListCoffee" type="submit">Download All</button>
    </form>
    <form id="searchForm" method = 'post' style="margin-bottom: 10px;float: right;"> 
    <input type="search" id="query" name="searchName" placeholder="Search...">
    <button>Search</button>
    </form>
</div>

<?php echo '<script'; ?>
> window.onload = function() { FixedMidashi.create(); }; <?php echo '</script'; ?>
>
<div class = 'scroll_div '>
<table class='overViewTable' _fixedhead='cols:2;'>
    <tr>
        <td></td>
        <td></td>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Type</b></td>
        <td><b>Price</b></td>
        <td><b>Roast</b></td>
        <td><b>Country</b></td>
        <td><b>Added Date</b></td>
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
 formaction="?action=coffeeUpdate">変更</button></td>
                <td><button name="delete" type="submit" value=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
 onclick="return show_confirm('<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
');">削除</button></td>
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
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td> 
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </form>
   
</table>
</div>


<?php echo $_smarty_tpl->tpl_vars['paging']->value;?>


<?php }
}

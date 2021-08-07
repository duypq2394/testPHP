<?php
/* Smarty version 3.1.39, created on 2021-08-05 16:55:58
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/Paging.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bfbfea06828_31328478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a12750b7aa4e0ded4379bd4ac48b4ff806bdcf32' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/Paging.tpl',
      1 => 1628075160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bfbfea06828_31328478 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value > 1) {?>
<div class="page-header">
    <ul id="pagination">
        <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?> <li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
">«</a></li> <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['page']->value > 3) {?>
            <li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=1">1</a></li>
            <?php if ($_smarty_tpl->tpl_vars['page']->value > 4) {?>
            <li style="display: inline;"><a href="#">...</a></li>
            <?php }?>
        <?php }?>
        <?php if (($_smarty_tpl->tpl_vars['page']->value-2) > 0) {?><li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value-2;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value-2;?>
</a></li><?php }?>
        <?php if (($_smarty_tpl->tpl_vars['page']->value-1) > 0) {?><li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
</a></li><?php }?>

        <li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" style="background-color:black; color:white;"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>

        <?php if (($_smarty_tpl->tpl_vars['page']->value+1) < ceil($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value)+1) {?><li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
</a></li><?php }?>
        <?php if (($_smarty_tpl->tpl_vars['page']->value+2) < ceil($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value)+1) {?><li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value+2;?>
</a></li><?php }?>

        <?php if ($_smarty_tpl->tpl_vars['page']->value < ceil($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value-2)) {?>
            <li style="display: inline;"><a href="#">...</a></li>
            <li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo ceil($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value);?>
"><?php echo ceil($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value);?>
</a></li>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['page']->value < ceil($_smarty_tpl->tpl_vars['numberRows']->value/$_smarty_tpl->tpl_vars['pageSize']->value)) {?> <li style="display: inline;"><a href="?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
">»</a></li><?php }?>
    </ul>
</div>
<?php }
}
}

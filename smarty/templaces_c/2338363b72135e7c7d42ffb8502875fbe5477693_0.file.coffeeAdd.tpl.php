<?php
/* Smarty version 3.1.39, created on 2021-05-25 12:20:43
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\coffeeAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60accf7b79b097_50912925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2338363b72135e7c7d42ffb8502875fbe5477693' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\coffeeAdd.tpl',
      1 => 1621937505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60accf7b79b097_50912925 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action='' method='post'>
    <fieldset>
    <legend>Add a new Coffee</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['valueArray']->value, 'value');
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
        </select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' /><br/>
                
        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/>
                
        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                <option value = '<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['image']->value;?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select><br/>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea><br/>

        <input type='submit' value='Submit'/>
    </fieldset>
</form>

<?php }
}

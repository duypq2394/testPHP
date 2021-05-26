<?php
/* Smarty version 3.1.39, created on 2021-05-26 04:34:39
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\coffeeUpdate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60adb3bf0ff376_68721148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78093a1a94a68db807d400d10a6a584e7548b754' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\coffeeUpdate.tpl',
      1 => 1621996372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60adb3bf0ff376_68721148 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['coffee']->value))) {?>
<form action='' method='post' name = "update">
    <fieldset>
        <legend>Add a new Coffee</legend>
        <input type="hidden" name="intId" value=<?php echo $_smarty_tpl->tpl_vars['coffee']->value->id;?>
/>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' value='<?php echo $_smarty_tpl->tpl_vars['coffee']->value->name;?>
' /><br/>

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
        <input type='text' class='inputField' name='txtPrice' value='<?php echo $_smarty_tpl->tpl_vars['coffee']->value->price;?>
'/><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' value='<?php echo $_smarty_tpl->tpl_vars['coffee']->value->roast;?>
'/><br/>
                
        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' value='<?php echo $_smarty_tpl->tpl_vars['coffee']->value->country;?>
'/><br/>
                
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
        <textarea cols='70' rows='12' name='txtReview'><?php echo $_smarty_tpl->tpl_vars['coffee']->value->review;?>
</textarea><br/>

        <input type='submit' value='Submit'/>
    </fieldset>
</form>
<?php }
}
}

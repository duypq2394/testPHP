<?php
/* Smarty version 3.1.39, created on 2021-08-07 07:06:01
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/pages/CoffeeAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610e14b9936cb9_31886339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d503e250f3dfa0dbca9552d3c0f48be11e2112a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/pages/CoffeeAdd.tpl',
      1 => 1628312755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610e14b9936cb9_31886339 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action='' method='post'>
    <fieldset>
    <legend>製品を追加し</legend>
        <label for='name'>コーヒ名: </label>
        <input type='text' class='inputField' name='txtName' />
        <span class="error" style = "color: #FF0000;">* <?php echo $_smarty_tpl->tpl_vars['nameErr']->value;?>
</span>
        <br/><br/>

        <label for='type'>タイプ: </label>
        <select class='inputField' name='ddlType'>
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
        </select><br/><br/>

        <label for='price'>価格: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/><br/>

        <label for='roast'>ロースト: </label>
        <input type='text' class='inputField' name='txtRoast' /><br/><br/>
                
        <label for='country'>国: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/><br/>
                
        <label for='image'>イメージ: </label>
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
        </select><br/><br/>

        <label for='date'>追加日:　 </label>
        <input type="text" id="datepicker" name='dateTime' value='<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
' disabled><br/><br/>

        <label for='review'>レビュー: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea><br/>

        <input type='submit' value='Submit' name="addCoffee"/>
    </fieldset>
</form>

<?php }
}

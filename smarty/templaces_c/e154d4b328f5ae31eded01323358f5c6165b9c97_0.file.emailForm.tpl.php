<?php
/* Smarty version 3.1.39, created on 2021-08-07 07:05:25
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/pages/emailForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610e1495dbf859_18216651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e154d4b328f5ae31eded01323358f5c6165b9c97' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/pages/emailForm.tpl',
      1 => 1628312718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610e1495dbf859_18216651 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="sendEmailForm" action="" method="post">
    <fieldset>
        <legend>メール</legend>
        お店のメールへ: <input type="text" name="storeEmail" value="simple.cofeeshop@gmail.com"  style="width: 300px;" disabled><br>
        他のメールへ: <select name = 'otherEmail' >
            <option value = '1' >To</option>
            <option value = '2' >CC</option>
            <option value = '3' >BCC</option>
        </select>
        <input type="text" name="addedEmail"  style="width: 300px;">
        <span class="error" style = "color: #FF0000;"><?php echo $_smarty_tpl->tpl_vars['emailErr']->value;?>
</span>
        <br><br>
        件名: <input type="text" name="title" style="width: 200px;">
        <span class="error" style = "color: #FF0000;" >* <?php echo $_smarty_tpl->tpl_vars['titleErr']->value;?>
</span>
        <br><br>
        内容: <span class="error" style = "color: #FF0000;" >* <?php echo $_smarty_tpl->tpl_vars['messageErr']->value;?>
</span>
        <textarea rows="5" name="message" cols="30" style="width: -webkit-fill-available;height: 300px;"></textarea>
        <br><br>
        <input type="submit" name="sendEmail" value="送る">
    </fieldset>
</form>

<?php }
}

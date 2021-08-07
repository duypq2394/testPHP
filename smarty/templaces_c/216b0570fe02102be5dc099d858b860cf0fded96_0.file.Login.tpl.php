<?php
/* Smarty version 3.1.39, created on 2021-08-05 17:02:35
  from '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/pages/Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_610bfd8b6450f4_06241538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '216b0570fe02102be5dc099d858b860cf0fded96' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/App/testPHP/smarty/templates/pages/Login.tpl',
      1 => 1627902980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_610bfd8b6450f4_06241538 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>ご利用にはログインが必要です。</h3>
<form method="POST" >
	<fieldset>
	    <legend>ログイン</legend>
			<?php if ((isset($_smarty_tpl->tpl_vars['error']->value))) {?>
				<h4 style="color:red;">
				 <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

				</h4>
			<?php }?>
	    	<table class = 'login'>
	    		<tr>
	    			<td>ユーザー名 </td>
	    			<td><input type="text" name="username" size="30" ></td>
	    		</tr>
	    		<tr>
	    			<td>パスワード </td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
				<tr>
					<td></td>
      				<td><input type="checkbox" name="remember" value="1"> ログイン状態を保存 </td>
				</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="ログイン"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
<?php }
}

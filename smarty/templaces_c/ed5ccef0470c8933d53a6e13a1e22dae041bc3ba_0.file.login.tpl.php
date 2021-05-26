<?php
/* Smarty version 3.1.39, created on 2021-05-26 11:52:32
  from 'C:\xampp\htdocs\test\testPHP\smarty\templates\pages\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60ae1a605d1747_14161022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed5ccef0470c8933d53a6e13a1e22dae041bc3ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\testPHP\\smarty\\templates\\pages\\login.tpl',
      1 => 1622022746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ae1a605d1747_14161022 (Smarty_Internal_Template $_smarty_tpl) {
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

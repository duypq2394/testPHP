<h3>ご利用にはログインが必要です。</h3>
<form method="POST" >
	<fieldset>
	    <legend>ログイン</legend>
			{if isset($error)}
				<h4 style="color:red;">
				 {$error}
				</h4>
			{/if}
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

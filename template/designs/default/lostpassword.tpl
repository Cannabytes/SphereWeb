<form name="form" method="post" action="">
<table cellpadding="0" cellspacing="0" class="repassForm">
<tr>
	<td colspan="2" align="center"><p>Восстановление пароля</p></td>
</tr>
[servers]
<tr>
	<td class="tdLeft">Сервер:</td>
  	<td class="tdRight"><select style="width: 100%;" name="sid">{servers}</select></td>
</tr>
[/servers]
<tr>
	<td class="tdLeft">Логин:</td>
  	<td class="tdRight"><input type="text" name="login" maxlength="14" class="input"></td>
</tr>
<tr>
	<td class="tdLeft">E-Mail:</td>
  	<td class="tdRight"><input type="text" name="email" maxlength="50" class="input"></td>
</tr>
[captcha]
<tr>
  	<td class="tdLeft">{captcha}</td>
  	<td class="tdRight"><input type="text" name="seccode" maxlength="10" class="input"></td>
</tr>
[/captcha]
[recaptcha]
<tr>
  	<td colspan="2">{code}</td>
</tr>
[/recaptcha]
<tr>
  	<td colspan="2" style="text-align: center;">
	  <input type="submit" name="repass"  value="Отправить" class="repassbutton" />
	</td>
</tr>
</table>
</form>
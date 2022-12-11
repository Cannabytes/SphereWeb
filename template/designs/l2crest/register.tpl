<div align='center'>
<form name="form" method="post" action="" onsubmit="return checkform(this)">
<table cellpadding="0" cellspacing="0" class="regForm">
<tr>
	<td colspan="2" align="center"><p>Регистрация аккаунта</p></td>
</tr>
[servers]
<tr>
	<td class="tdLeft">Сервер:</td>
  	<td class="tdRight"><select style="width: 100%;" name="sid">{servers}</select></td>
</tr>
[/servers]
<tr>
	<td class="tdLeft">Аккаунт:<br><span class="description">(От 4 до 14 символов)</span></td>
  	<td class="tdRight"><input type="text" name="l2account" maxlength="14" class="input"></td>
</tr>
<tr>
	<td class="tdLeft">Пароль:<br><span class="description">(От 6 до 16 символов)</span></td>
  	<td class="tdRight"><input type="password" name="l2password1" maxlength="16" class="input"></td>
</tr>
<tr>
  	<td class="tdLeft">Повторите пароль:</td>
  	<td class="tdRight"><input type="password" name="l2password2" maxlength="16" class="input"></td>
</tr>
<tr>
  	<td class="tdLeft">Email:<br><span class="description">(Введите действующий e-mail адрес)</span></td>
  	<td class="tdRight"><input type="text" name="l2email" maxlength="64" class="input"></td>
</tr>
[captcha]
<tr>
  	<td class="tdLeft">{l2sec_code}</td>
  	<td class="tdRight"><input type="text" name="l2sec_code" maxlength="10" class="input"></td>
</tr>
[/captcha]
<tr>
  	<td colspan="2" style="text-align: center;"><input type="submit" name="register"  value="Регистрация" class="regbutton" /></td>
</tr>
</table>
</form>
</div>
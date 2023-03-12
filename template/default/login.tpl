[logged]
<div id="cp">
Привет, <b>{user}</b><br />
<a href="{uCHARS}">Аккаунт</a><br />
<a href="{uCHPASS}">Сменить пароль</a><br />
<a href="{uCHMAIL}">Сменить E-mail</a><br />
<a href="{uSUPPORT}">Поддержка</a><br />
<a href="{uROBO}">Пожертвования</a><br />
<a href="{uCHSEX}">Смена пола</a><br />
<a href="{uCHNAME}">Смена ника</a><br />
<a href="{uCHANGER}">Обменник</a><br />
<a href="{uREFERAL}">Пригласи друга</a><br />
<a href="{url}/index.php?doExit=yes">Завершить сеанс</a>
</div>
[/logged]
[login]
<div id="login">
<form action="" method="post" name="dologin">
<input type="hidden" value="1" name="doLogin">
<input type="submit" style="display:none">
<table width="170" cellpadding="0" cellspacing="0">
<tr>
	<td width="70" height="25" valign="top" align="left">Логин:</td>
	<td width="100" valign="top"><input type="text" name="sw_name" style="width: 100px;" maxlength="16"></td>
</tr>
<tr>
	<td height="25" valign="top" align="left">Пароль:</td>
	<td valign="top"><input type="password" name="sw_pass" style="width: 100px;" maxlength="16"></td>
</tr>
[servers]
<tr>
	<td height="25" valign="top" align="left">Сервер:</td>
	<td valign="top">{servers}</td>
</tr>
[/servers]
[captcha]
<tr>
	<td height="25" valign="top" align="left">{l2sec_code}</td>
  	<td valign="top"><input type="text" name="l2sec_code" maxlength="10" style="width: 100px;"></td>
</tr>
[/captcha]
[recaptcha]
<tr>
	<td>{code}</td>
	<td>{field}</td>
</tr>
[/recaptcha]
<tr>
	<td colspan="2" align="center">
		<a href="{uFORGET}">Забыли пароль?</a> &nbsp; <a href="/" onclick="javascript: document.dologin.submit(); return false;">Войти</a>		
	</td>
</tr>
</table>
</form>
</div>
[/login]
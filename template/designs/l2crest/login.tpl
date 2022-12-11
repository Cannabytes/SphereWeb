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
<input type="text" name="sw_name" maxlength="16">
<input type="password" name="sw_pass" maxlength="16">
[servers]
{servers}
[/servers]
[captcha]
{l2sec_code}
<input type="text" name="l2sec_code" maxlength="10">
[/captcha]
[recaptcha]
{code}
{field}
[/recaptcha]
		<a href="{uFORGET}">Забыли пароль?</a> &nbsp; <a href="/" onclick="javascript: document.dologin.submit(); return false;">Войти</a>		
</form>
</div>
[/login]


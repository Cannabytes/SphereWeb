[profile]
<div align="center">
<H3>~ Личный кабинет ~</H3>
<table width="90%" cellpadding="0" cellspacing="0" class="tabProfileMenu">
<tr>
	<td align="center" height="30">
		<a href="index.php?doExit=yes"> <u>Завершить сеанс</u> </a>
	</td>
</tr>
<tr>
	<td align="center">
		<a href="{uCHARS}">::Персонажи::</a>
		<a href="{uCHPASS}">::Сменить пароль::</a>
		<a href="{uCHMAIL}">::Сменить E-Mail::</a>
		<a href="{uSUPPORT}">::Поддержка::</a>
		<a href="{uROBO}">::Пожертвование::</a>
		<a href="{uCHSEX}">::Смена пола::</a>
		<a href="{uCHNAME}">::Смена ника::</a>
		<a href="{uCHANGER}">::Обменник::</a>
		<a href="{uREFERAL}">::Пригласи друга::</a>
	</td>
</tr>
</table>
{content}
</div>
[/profile]
[login]
<div class="page">
<br>
<div class="page-title">Личный кабинет</div>
<form action="" method="post" name="do_login">
<input type="hidden" value="1" name="doLogin">
<table style="width:70%;">
[servers]
<tr>
	<td width="50%"><div class="c_text">Сервер</div></td>
	<td>{servers}</td>
</tr>
[/servers]
<tr>
	<td width="50%"><div class="c_text">Логин:</div></td>
	<td><input type="text" name="sw_name" style="width:50%" maxlength="16"></td>
</tr>
<tr>
	<td><div class="c_text">Пароль:</td>
	<td><input type="password" name="sw_pass" style="width:50%" maxlength="16"></td>
</tr>
[captcha]
<tr>
	<td><div class="c_text">{l2sec_code}</div></td>
  	<td><input type="text" class="input-c" name="l2sec_code" maxlength="10" style="width:50%"></td>
</tr>
[/captcha]
[recaptcha]
<tr>
  	<td colspan="2">{code}</td>
</tr>
[/recaptcha]
<tr>
	<td colspan="2" align="center"><br>
	<input type="submit" name="submit" class="login" value="Войти" />
	</td>
</tr>
</table>
</form></div>
[/login]
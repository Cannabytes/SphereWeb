<div class="page">
<br>
<div class="page-title">Регистрация аккаунта</div>

<form name="form" method="post" action="" onsubmit="return checkform1(this)">
<table style="width:70%;">
[servers]
<tr>
	<td class="label">Сервер:</td>
  	<td><select style="width:83%;" name="sid">{servers}</select></td>
	<td></td>
</tr>
[/servers]
[prefix]
<tr>
	<td class="label">Префикс:</td>
  	<td><select style="width:91%;" name="l2prefix">{prefix}</select></td>
	<td>будет добавлен к аккаунту</td> 

</tr>
[/prefix]
<tr>
	<td class="label">Логин:</td>
  	<td><input type="text" name="l2account" maxlength="14" class="input-u" style="width:83%;"></td>
	<td>От 4 до 14 символов</td> 

</tr>
<tr>
	<td class="label">Пароль:</td>
  	<td><input type="password" name="l2password1" maxlength="16" class="input-p" style="width:83%;"></td>
	<td>От 6 до 16 символов</td> 
</tr>
<tr>
  	<td class="label">Повторите пароль:</td>
  	<td><input type="password" name="l2password2" maxlength="16" class="input-p" style="width:83%;"></td>
	<td></td>
</tr>
<tr>
  	<td class="label">Email:</td>
  	<td><input type="text" name="l2email" maxlength="64" class="input-u" style="width:83%;"></td>
	<td></td>

</tr>
[captcha]
<tr>
  	<td class="label">{l2sec_code}</td>
  	<td><input type="text" name="l2sec_code" maxlength="10" class="input-c" style="width:83%;"></td>
	<td></td>
</tr>
[/captcha]
[recaptcha]
<tr>
  	<td colspan="2">{code}</td>
</tr>
[/recaptcha]
[referal]
<tr>
	<td class="label">Ник друга:</td>
  	<td><input type="text" name="l2friend" maxlength="16" class="input-u" style="width:83%;"></td>
	<td>необязательно</td>
</tr>
[/referal]
<tr>
	<td></td>
	<td colspan="2"><input type="submit" name="register"  value="Регистрация"  /></td>
</tr>
</table>
</form>
<br>
</div><!-- .page-->

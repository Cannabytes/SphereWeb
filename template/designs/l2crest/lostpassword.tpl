<style>
  #more {display: none;}
  .static_wrapper {
      width: 100%;
      padding: 20px 0;
      border-radius: 15px;
    overflow: hidden;
    }
</style>

<div class="static_wrapper">
  <div class="static_title">
    Восстановление пароля
  </div>
  <div class="static_content">
<div align="center">
<form name="form" method="post" action="">

[servers]
<div class="input_wrapper">
  <span>Сервер:</span>
    <select style="width: 100%;" name="sid">{servers}</select>
</div>
[/servers]
<div class="input_wrapper">
    <input type="text" name="login" maxlength="14" class="input" placeholder="Логин..">
</div>
<div class="input_wrapper">
    <input type="text" name="email" maxlength="50" class="input" placeholder="E-mail..">
</div>
[captcha]
<div class="input_wrapper">
    {captcha}
    <input type="text" name="seccode" maxlength="10" class="input">
</div>
[/captcha]
[recaptcha]
<div class="input_wrapper">
    {code}
</div>
[/recaptcha]

    <div class="input_wrapper">
    <input type="submit" name="repass"  value="Отправить" class="btn" />
  </div>


</form>
</div>
</div>
</div>
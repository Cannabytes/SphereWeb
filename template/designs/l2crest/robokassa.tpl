[stage1]
<div style="text-align: justify;"><p align="center"><b>Пожертвование - Шаг 1</b></p>
Вы ничего не покупаете и мы ничего не продаем. Вы помогаете серверу в той мере, в какой сервер может помочь вам. Обмен признается равнозначным и считается благотворительностью. Потому никаких претензий относительно сохранности, качества, гарантий мы не принимаем. Никаких гарантий мы не даем. Если вы НЕ согласны с вышеизложенным - немедленно покиньте данную страницу.<br><br>
</div>

<h2><a href="http://www.roboxchange.com/" target="_blank"><img id="robo" name="robo" src="{url}/sysimg/robokassa.jpg" alt="ROBOX"></a></h2><br>
[server]
<fieldset>
	<legend><b>Оформление заказа - Сервер</b></legend>
	<script type="text/javascript">
	$(document).ready(function(){
		if($('#rbchar').val()==null){
			$('input[name=bill]').hide();
		}
		$("#swpaysid #rbsid").change(function(){
			[remove]
			$("#swpaysid").attr('action',$("#swpaysid").attr('action')+$("#rbsid option:selected").val());
			$("#rbsid").remove();
			$("#rbf").remove();
			$("#rbopt").remove();
			[/remove]
			$("#swpaysid").submit();
		});
	});
	</script>
	<table border="0" cellpadding="6" width="100%">
	<tr>
		<td  align="left" width="30%">Выберите сервер:</td>
		<td align="left" width="420" height="30">
			<form action="{action_sid}" method="GET" id="swpaysid" name="sid">
			<input type="hidden" name="f" value="cp" id="rbf" />
			<input type="hidden" name="opt" value="robo" id="rbopt" />
			{serverList}
			</form>
		</td>
	</tr>
	</table>
</fieldset>
[/server]
[noChar]
<div class="error">У Вас нету персонажей на этом сервере или они находятся в игре</div>
[/noChar]
[isChar]
<form action="{action}" method="post">
<fieldset>
	<legend><b>Оформление заказа - Персонаж</b></legend>
	<table border="0" cellpadding="6" width="100%">
	<tr>
		<td align="left" width="30%">Имя персонажа:</td>
		<td align="left" height="30" width="420">
			<select name="char" style="width: 160px" id="rbchar">
				{charOptions}
			</select>
		</td>
	</tr>
	</table>
</fieldset>
<input type="hidden" name="rnd" value="{rnd}" />
<p align="right"><input value="Продолжить" name="bill" type="submit"></p>
</form>
[/isChar]
[/stage1]
[stage2]
<script type="text/javascript">
function sel_valuta()
{
	document.getElementById('rbcount').options[0].selected = true;
	document.getElementById('rbcosts').innerHTML = "";
}
$(document).ready(function(){
	
	$('#bonus').hide();
	
	$("#rbcount").change(function(){
	
	$("#robobusy").show();
	
	$('#bonus').hide();
		
	var col = $("#rbcount option:selected").val();
	if(col!=""){
		$.ajax({
			type: "POST",
			url: "{url}/ajax/aj.robo.php",
			data: ({order : $("#ordernum").text(), inv : $('#InvId').val(), col : col, shpa : $("#shpa").val(), shpb : $("#shpb").val()}),
			dataType: 'json',
			success: function(result){
				$("#robobusy").hide();
				if(result.code != 10){
					$("#rbcosts").text(result.msg);
				}
				else {
					$("#rbcosts").text(result.outsum +" "+  $("#IncCurrLabel").val().substring(0,3) );
					$("#MrchLogin").val(result.login);
					$("#OutSum").val(result.outsum);
					$("#Desc").val(result.desc);
					$("#SignatureValue").val(result.sign);
					$('#bonus').show();					
				}
		   }
		});
	}
	
	});

});
</script>
<div style="text-align: justify;"><p align="center"><b>Пожертвование - Шаг 2</b></p></div>
<fieldset>
	<legend><b>Оформление заказа</b></legend>
	<table border="0" cellpadding="6" width="100%">
	<tr>
		<td align="left" width="30%">Кол-во {itemName}:</td>   
		<td align="left" height="30" width="420">
			<select id="rbcount" name="count" style="width: 160px;">
			<option value="" selected disabled>...</option>
			{options}
			</select>
		</td>
	</tr>
	</table>
</fieldset>
<form id="roboks" method="post" name="roboks"  action="http://test.robokassa.ru/Index.aspx">
<fieldset>
	<legend><b>Информация о заказе</b></legend>
	<table border="0" cellpadding="6" width="100%">
	<tbody>
	<tr>
		<td align="left" width="30%">Данные заказа:</td>
		<td align="left" width="70%"><span id="rbtext" class="out">Сервер: <b>{serverName}</b> Персонаж: <b>{charName}</b> Заказ №</span><b><span id="ordernum">{order}</span></b></td>
	</tr>
	<tr>
		<td align="left" width="30%">Сумма :</td>
		<td align="left" width="70%"><img src="{url}/sysimg/loading.gif" alt="loading..." id="robobusy" style="display:none" /> <span id="rbcosts" class="out" style="visibility: visible;"></span></td>
	</tr>
	</tbody>
	</table>

<input type="hidden" name="MrchLogin" id="MrchLogin" value="login" />
<input type="hidden" name="OutSum" id="OutSum" value="QQ" />
<input type="hidden" name="InvId" id="InvId" value="{InvId}" />
<input type="hidden" name="Desc" id="Desc" value="QQ" />
<input type="hidden" name="SignatureValue" id="SignatureValue" value="QQ" />
<input type="hidden" name="IncCurrLabel" id="IncCurrLabel" value="{valuta}" />
<input type="hidden" name="shpa" id="shpa" value="{shpa}" />
<input type="hidden" name="shpb" id="shpb" value="{shpb}" />
	<p align="center" style="color: red;"><b>Сумма при оплате может незначительно отличаться из-за разницы в курсах</b></p>
</fieldset>
	<p align="right"><input value="Пожертвовать" name="bonus" id="bonus" type="submit"></p>
</form>
[/stage2]
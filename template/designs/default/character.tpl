<script type='text/javascript' src='{template}/js/wz_tooltip.js'></script>
<script type='text/javascript' src='{template}/js/flexcroll.js'></script>
<center>
<table id="l2char" width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
	<th colspan="9">Просмотр персонажа <b>{charname}</b> ({level} lvl.)</th>
</tr>
<tr>
	<th width="72px" rowspan="4" class="char">
		{sex} &nbsp; {race}<br>
		{prof}</th>
	<th width="45px">CP
	<th width="45px">HP
	<th width="45px">MP
	<th width="45px">Karma
	<th width="90px" colspan="2">Exp
	<th width="90px" colspan="2">SP
</tr>
<tr>
	<td>{cp}</td>
	<td>{hp}</td>
	<td>{mp}</td>
	<td>{karma}</td>
	<td colspan="2">{exp}</td>
	<td colspan="2">{sp}</td>
</tr>
<tr>
	<th width="40px">PvP
	<th width="40px">PK	
	<th width="40px">STR
	<th width="40px">DEX
	<th width="40px">CON
	<th width="40px">INT
	<th width="40px">WIT
	<th width="40px">MEN
</tr>
<tr>
	<td>{pvp}</td>
	<td>{pk}</td>
	<td>{str}</td>
	<td>{dex}</td>
	<td>{con}</td>
	<td>{int}</td>
	<td>{wit}</td>
	<td>{men}</td>
</tr>
</table>
<div id='l2paperdoll' align="left">
	<div id='l2paperdoll_items' align="left">
		{paperdoll}
	</div>
</div>
<div id='l2inventory' align="left">
	<div id='l2inventory_items' class='flexcroll'>
		{inventory}
		<div class='clearfloat'></div>
	</div>
</div>
</center>

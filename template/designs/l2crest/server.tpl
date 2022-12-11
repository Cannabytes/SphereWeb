[main]
<!-- Модуль Статус Серверов -->
<div class="serv_wrp">
{item}
<script>
$(document).ready(function(e) {
	    $('.server.first').find('.circle').circleProgress({
        
        value: online = $('.first').attr('data-online')/1000,
        
        emptyFill: 'rgba(255,255,255,0)',
        thickness: 31,
        startAngle: 4.73,
        fill: {  image: "{template}/images/load.png" }
    });  
    $('.server.second').find('.circle').circleProgress({
        value: online = $('.second').attr('data-online')/1000,
        emptyFill: 'rgba(255,255,255,0)',
        thickness: 31,
        startAngle: 4.73,
        fill: {  image: "{template}/images/load.png" }
    });   
    $('.server.three').find('.circle').circleProgress({
        value: online = $('.three').attr('data-online')/1000,
        emptyFill: 'rgba(255,255,255,0)',
        thickness: 31,
        startAngle: 4.73,
        fill: {  image: "{template}/images/load.png" }
    });      
  });  
</script>
</div>
[/main]

[item]
<div class="server" data-online="{online}">
                <div class="name_wrp">
                	<div class="name">
                	    <span>
							{name}
                	    </span>
                	    {chronicle}
                	</div>
                </div>
                <div class="circle"></div>
            </div>
[/item]


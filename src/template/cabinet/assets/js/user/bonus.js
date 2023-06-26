$(document).ready(function () {

    $(".bonusPanel").on('click',function(e) {
          e.preventDefault();
          var $this = $(this);
          var bonusId = $this.data('bonus-id');
          var icon = $this.data('icon');
          var enchant = $this.data('enchant');
          var name = $this.data('name');
          var count = $this.data('count');
          var phrase = $this.data('phrase');
          if(enchant==0){
            $("#bonusEnchant").hide()
            $("#bonusIcon").removeClass("player-inventory-enchant");
          }else{
            $("#bonusEnchant").show()
            $("#bonusIcon").addClass("player-inventory-enchant");
            $("#bonusEnchant").text("+" + enchant)
          }
          $("#bonusNameItem").text(name)
          $("#bonusCount").text("x"+count)
          $("#bonusPhrase").text(phrase)
          $("#bonusIcon").attr("src", "/uploads/images/icon/"+icon+".webp");
          $("#bonusSendToPlayer").data("item-object", bonusId);

    });

    $("#bonusSendToPlayer").on('click',function(e) {
         e.preventDefault();
         var object_id = $(this).data('item-object')
         var player_name = $("#bonusCharName").val()
         $.ajax({
            type: "POST",
            url: "/bonus/receiving",
            dataType: "json",
            data: {
                object_id: object_id,
                player_name: player_name,
            },
            success: function(result) {
                if (result.ok){
                    $("#bonusObjectID"+object_id).remove();
                    $('#bonusPanel').modal('hide');
                    if($("#bonusSubHeaderButton li").length == 1){
                        $("#bonusHeaderButton").remove();
                    }
                    notify_success(result.message);
                }else{
                    notify_error(result.message);
                }
            },
            error: function(result) {
                notify_error(result.message);
            }
        });
    });

});
 
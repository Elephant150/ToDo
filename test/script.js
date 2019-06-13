$(function () {
    var id = $(".list").val();
    $.ajax({
        type: "POST",
        url: "conf.php",
        data: {id: id},
        success: function(data){
            $(".item").html(data);
        }
    });
   $(".list").change(function () {
      var id = $(".list").val();
      if(id == 0){

      }
      $.ajax({
          type: "POST",
          url: "conf.php",
          data: {id: id},
          success: function(data){
              $(".item").html(data);
          }
      });
   });
});
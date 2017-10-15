$(document).ready(function() {
   var max_charts = 1500;
   $('#body_new_comment').keyup(function() {
  	  var long = $(this).val().length;
  	  var leftt = max_charts - long;
      $('.processing').text('Left '+ leftt +' characters');
      if(leftt <= 100){
        $('.processing').css("color", "red");
      }
      if(leftt > 100){
        $('.processing').css("color", "blue");
      }
      if(leftt <= 0){
  	    $('#body_new_comment').attr("maxlength", max_charts);
  	  }
  });

  var max_charts2 = 150;
  $('#title_new_comment').keyup(function() {
     var long2 = $(this).val().length;
     var leftt2 = max_charts2 - long2;
     $('.processing2').text('Left '+ leftt2 +' characters');
     if(leftt2 <= 15){
       $('.processing2').css("color", "red");
     }
     if(leftt2 > 15){
       $('.processing2').css("color", "blue");
     }
     if(leftt2 <= 0){
       $('#title_new_comment').attr("maxlength", max_charts2);
     }
   });
});

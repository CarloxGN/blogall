$(function() {
  $('#comments').html('<img src="images/load.gif" alt="" />').fadeIn(1500);
  $('#comments').fadeOut(1500);
  $.ajax({
      type    : "POST",
      url     : "index.php?pg=comments.process",
      success : function(data) {
          $('.comments').fadeIn(1000).html(data);
      }
  }),2000;
})

  $('#addlike').click(function(){
    $.ajax({
        type    : "POST",
        url     : "index.php?pg=likes.process",
        success : function(data) {
            $('#showlikes').fadeIn(1000).html(data);
        }
    }),2000;
  });

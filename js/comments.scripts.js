$(document).ready(function() {
    $('#send-btn').click(function(){
      $('#processing').html('<img src="images/load.gif" alt="" />').fadeIn(1500);
      var title_new_comment = $('#title_new_comment').val();
      var body_new_comment = $('#body_new_comment').val();
      var id_blog = $('#id_blog-comment').val();
      var ref = $('#ref').val();
      if(title_new_comment.length < 10 || body_new_comment.length < 20){
        $('#msg').fadeIn(1000).html('<span style="font-weight:bold;color:red;font-size:10px;width:250px">Title or Body too short</span>');
      }else{
        if(title_new_comment.length > 150){
          $('#msg').fadeIn(1000).html('<span style="font-weight:bold;color:red;font-size:10px;width:250px">Title too long (max. 150 chars )</span>');
        }else{
          if(body_new_comment.length > 1500){
            $('#msg').fadeIn(1000).html('<span style="font-weight:bold;color:red;font-size:10px;width:250px">Body too long (max. 1500 chars )</span>');
          }else{
            $('#body_new_comment').val('');
            $('#title_new_comment').val('');
            var dataString = 'title='+title_new_comment+'&body='+body_new_comment+'&ref='+ref+'&id_blog='+id_blog;
            $.ajax({
              type    : "POST",
              url     : "index.php?pg=addcomment.process",
              data    : dataString,
              success : function(data) {
                $('.comments').fadeIn(1000).html(data);
              }
            }),2000;
          }
        }
      }
    });

    $('#email_new').blur(function(){
        $('#result2').html('<img src="images/load.gif" alt="" />').fadeIn(1500);
        var email = $(this).val();
        if(email.length >= 1 && email.length < 8){
          $('#result2').fadeIn(1000).html("<span style='font-weight:bold;color:red;'>Invalid email address</span>");
        }else{
          var dataString = 'email='+email;
          $('#result2').fadeOut(1500);
          $.ajax({
              type    : "POST",
              url     : "index.php?pg=validate",
              data    : dataString,
              success : function(data) {
                  $('#result2').fadeIn(1000).html(data);
              }
          }),2000;
        }
    });
});

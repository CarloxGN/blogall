$(document).ready(function() {
    $('#usr').blur(function(){
        $('#result1').html('<img src="images/load.gif" alt="" />').fadeIn(1500);
        var username = $(this).val();
        if(username.length > 0 && username.length < 4){
          $('#result1').fadeIn(1000).html("<span style='font-weight:bold;color:red;'>Name too short</span>");
        }else{
          var dataString = 'username='+username;
          $('#result1').fadeOut(1500);
          $.ajax({
              type    : "POST",
              url     : "index.php?pg=validate",
              data    : dataString,
              success : function(data) {
                  $('#result1').fadeIn(1000).html(data);
              }
          }),2000;
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

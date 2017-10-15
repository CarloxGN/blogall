$(document).ready(function(){
  var divdisplay = false;
   $("#register").click(function(e){
      if (divdisplay == false){
         $("#formregister").css("display", "block");
         divdisplay = true;
      }else{
         $("#formregister").css("display", "none");
         divdisplay = false;
      }
   });
});

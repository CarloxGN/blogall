$(document).ready(function(){
  $("#formuploadajax<?php echo strtotime($com['register_comment']);?>").on("submit", function(e){
     e.preventDefault();
     var f = $(this);
     var formData = new FormData(document.getElementById("formuploadajax<?php echo strtotime($com['register_comment']);?>"));
     formData.append("data", "value");
     //formData.append(f.attr("name"), $(this)[0].files[0]);
     $.ajax({
       url: "index.php?pg=addreply.process",
       type: "post",
       dataType: "html",
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       success : function(data) {
          $('.listreplies<?php echo  strtotime($com['register_comment']);?>').fadeIn(1000).html(data);
       }
     })
   });
 });

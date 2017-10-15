$(document).ready(function() {
  $("#formuploadajax").on("submit", function(e){
    var title = $('#title').val();
    var subtitle = $('#subtitle').val();
    var body = tinymce.get('body').save()
    //var body = $('#body').val();
    if(title.length < 10){
      $('.processing').fadeIn(1000).html('<div class="alert alert-danger">Title too short (min. 10 characters)</div>');
    }else{
      if(title.length > 250){
        $('.processing').fadeIn(1000).html('<div class="alert alert-danger">Title too long (max. 250 characters)</div>');
      }else{
        if(subtitle.length < 10){
          $('.processing').fadeIn(1000).html('<div class="alert alert-danger">Subtitle too short (min. 10 characters)</div>');
        }else{
          if(subtitle.length > 400){
            $('.processing').fadeIn(1000).html('<div class="alert alert-danger">Title too long (max. 400 characters)</div>');
          }else{
            if(body.length < 50){
              $('.processing').fadeIn(1000).html('<div class="alert alert-danger">Body too short (min. 50 characters)</div>');
            }else{
              e.preventDefault();
              var f = $(this);
              var formData = new FormData(document.getElementById("formuploadajax"));
              formData.append("data", "value");
              //formData.append(f.attr("name"), $(this)[0].files[0]);
              $.ajax({
                url: "?pg=createblog.process",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success : function(data) {
                  $('.processing').fadeIn(1000).html(data);
                }
              })
            }
          }
        }
      }
    }
  });
});

<script type="text/javascript">
$(document).ready(function() {
  $("#formuploadajax").on("submit", function(e){
      e.preventDefault();
      var f = $(this);
      var formData = new FormData(document.getElementById("formuploadajax"));
      formData.append("data", "value");
      //formData.append(f.attr("name"), $(this)[0].files[0]);
      $.ajax({
        url: "<?php echo WEBSITEPATH;?>?pg=createblog.process",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
             processData: false,
        success : function(data) {
          $('.comments').fadeIn(1000).html(data);
        }
      })
   });
});
</script>

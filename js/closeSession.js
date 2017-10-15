function closeSession() {
  $.ajax({
    url: "?pg=close",
    success: function(){
      location.assign('index.php?pg=start&suc=3');
      window.location;
    }
  });
}

$(document).ready(function() {
    $("#send-btn").click(function() {
        var title = $("input#title").val();
        var body = $("textarea#body").val();
        var user = $("textarea#user").val();

                if (title == '') {
                    alert('Please, write a Tittle.');
                    return false;
                }

                if (body == '') {
                    alert('Please, write a Comment.');
                    return false;
                }

                if (user == '') {
                    //window.location.href = "index.php?er=4";
                    return false;
                }

        var dataString = 'title=' + title + '&body=' + body + '&id=' + user;

        $.ajax({
            type: "POST",
            url: "bin/addcomments.process.php",
            data: dataString,
            success: function() {
                $('.comments').
                  append('<div><div><img width="48" height="48" src="images/user.png" /></div><div><strong>'
                  +name+
                  '</strong> dice:<br/><small>'
                  +date_show+
                  '</small></div><div>'
                  +comment+
                  '</div></div>');
            }
        });
        return false;
    });
});

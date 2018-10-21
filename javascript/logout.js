$('#ilink-logout').click(function(event) {
    event.preventDefault(); //Prevent href default
    var ajaxData = {
        'operation':    'logout',
    };

    $.ajax({
        type:       'POST',
        url:        'user-controller.php',
        data:       ajaxData,
        success:    function(data) {
                        if (data == true) {
                            window.location = "index.php";
                        } else {
                            alert("Logout error");
                        }
                    },
        error:      function(jqXHR, textStatus, errorThrown) {
                        alert("Ajax error: " + errorThrown);
                    }
    });
});
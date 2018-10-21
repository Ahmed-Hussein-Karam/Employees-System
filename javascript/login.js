$('#iform-login').submit(function(event) {
    event.preventDefault(); //Prevent the default submit
    var ajaxData = {
        'operation':    'login',
        'email':        $('#iinp-email').val(),
        'password':     $('#iinp-password').val()
    };

    $.ajax({
        type:       'POST',
        url:        'user-controller.php',
        data:       ajaxData,
        success:    function(data) {
                        if (data == true) {
                            window.location = "home.php";
                        } else {
                            alert("Incorrect email or password");
                        }
                    },
        error:      function(jqXHR, textStatus, errorThrown) {
                        alert("Ajax error: " + errorThrown);
                    }
    });
});
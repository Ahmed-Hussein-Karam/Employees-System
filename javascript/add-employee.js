$('#iform-add-employee').submit(function(event) {
    event.preventDefault(); //Prevent the default submit
    var ajaxData = {
        'operation':  'add',
        'full-name':       $('#iinp-name').val(),
        'email':      $('#iinp-email').val(),
        'mobile':     $('#iinp-mobile').val(),
        'hire-date':       $('#iinp-date').val()
    };

    $.ajax({
        type:       'POST',
        url:        'employee-controller.php',
        data:       ajaxData,
        success:    function(data) {
                        if (data == true) {
                            window.location = "home.php";
                        } else {
                            alert("Error adding new employee");
                        }
                    },
        error:      function(jqXHR, textStatus, errorThrown) {
                        alert("Ajax error: " + errorThrown);
                    }
    });
});
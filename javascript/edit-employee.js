$('#iform-edit-employee').submit(function(event) {
    event.preventDefault(); //Prevent the default submit
    var ajaxData = {
        'operation':  'update',
        'employee-id': new URL(window.location).searchParams.get('employee-id'), //gets employee id from url parameters
        'full-name':   $('#iinp-full-name').val(),
        'email':       $('#iinp-email').val(),
        'mobile':      $('#iinp-mobile').val(),
        'hire-date':   $('#iinp-hire-date').val()
    };

    $.ajax({
        type:       'POST',
        url:        'employee-controller.php',
        data:       ajaxData,
        success:    function(data) {
                        if (data == true) {
                            window.location = "home.php";
                        } else {
                            alert("Error updating employee data");
                        }
                    },
        error:      function(jqXHR, textStatus, errorThrown) {
                        alert("Ajax error: " + errorThrown);
                    }
    });
});
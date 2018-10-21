$('#itbl-employees').DataTable({
    "order": [[0, "desc"]],
    "iDisplayLength": 10,
    "bPaginate": true,
    "sPaginationType": "full_numbers"
});

var ajaxData = {
    'operation': 'list',
};

$.ajax({
    type:       'POST',
    url:        'employee-controller.php',
    data:       ajaxData,
    success:    function(data) {
                    if (data) {
                        $("#itbl-body-employees").html(data);
                    } else {
                        alert("Error fetching employees data");
                    }
                },
    error:      function(jqXHR, textStatus, errorThrown) {
                    alert("Ajax error: " + errorThrown);
                }
});

function deleteEmployee(employeeID) {
    var ajaxData = {
        'operation': 'delete',
        'employee-id': employeeID
    }
    
    $.ajax({
        type:       'POST',
        url:        'employee-controller.php',
        data:       ajaxData,
        success:    function(data) {
                        if (data) {
                            window.location = "home.php";
                        } else {
                            alert("Error deleting employee");
                        }
                    },
        error:      function(jqXHR, textStatus, errorThrown) {
                        alert("Ajax error: " + errorThrown);
                    }
    });
}
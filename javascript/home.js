$(document).ready(function () {
    $('#itbl-employees').DataTable({
        "order": [[0, "desc"]],
        "iDisplayLength": 10,
        "bPaginate": true,
        "sPaginationType": "full_numbers"
    });
});
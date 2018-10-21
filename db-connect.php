<?php 

$db_connection = mysqli_connect("localhost", "root", "34235476aH_95.");

if(!$db_connection) {
    die("<h2>Database error</h2>" .
        "<b>Error Number:</b> " . mysqli_connect_errno() . "<br />" . 
        "<b>Error Message:</b> " . mysqli_connect_error()
    );
}

mysqli_select_db($db_connection, "employees-system");

?>
<?php 

$db_connection = mysqli_connect("localhost", "root", "34235476aH_95.");

if(!$db_connection) {
    die("Error connecting to the database: <br />" .
        "Error Number: " . mysqli_connect_errno() . "<br />" . 
        "Error Message: " . mysqli_connect_error()
    );
}

mysqli_select_db($db_connection, "employees-system");

?>
<?php 

$db_connection = mysqli_connect("localhost", "<USERNAME_HERE>", "<PASSWORD_HERE>");

if(!$db_connection) {
    die("<h2>Database error</h2>" .
        "<b>Error Number:</b> " . mysqli_connect_errno() . "<br />" . 
        "<b>Error Message:</b> " . mysqli_connect_error()
    );
}

mysqli_select_db($db_connection, "employees-system");

?>
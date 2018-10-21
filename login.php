<?php 

$db_connection = mysqli_connect("localhost", "root", "34235476aH_95.");

if(!$db_connection) {
    die("Error connecting to the database: <br />" .
        "Error Number: " . mysqli_connect_errno() . "<br />" . 
        "Error Message: " . mysqli_connect_error()
    );
}

mysqli_select_db($db_connection, "employees-system");

$authentication_query = "SELECT Email, Passwd FROM Users WHERE Email = '" . $_POST['email'] . "' AND Passwd = '" . $_POST['password'] . "'";
$query_result = mysqli_query($db_connection, $authentication_query);

if(mysqli_num_rows($query_result) == 0) {
    include "login-error.html";
} else {
    include "home.html";
}

?>
<?php

include_once "db-connect.php";

session_start();
if(isset($_SESSION['email'])) { //already logged in
    include_once "home.php";
} else if(! isset($_POST['email']) || ! isset($_POST['password'])) {
    die ("<b>Error:</b> Missing credentials");
} else {
    $query = "SELECT Email, Passwd FROM Users WHERE Email = '" . 
             $_POST['email'] . "' AND Passwd = '" . $_POST['password'] . "'";
    $query_result = mysqli_query($db_connection, $query);

    if(mysqli_num_rows($query_result) == 0) {
        include_once "login-error.html";
    } else {
        $_SESSION["email"] = $_POST["email"];
        include_once "home.php";
    }
}

mysqli_close($db_connection);
?>
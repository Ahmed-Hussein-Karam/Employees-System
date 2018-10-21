<?php

function login() {
    include_once "db-connect.php";

    $query = "SELECT Email, Passwd FROM Users WHERE Email = '" . 
            $_POST['email'] . "' AND Passwd = '" . $_POST['password'] . "'";
    $query_result = mysqli_query($db_connection, $query);

    if(mysqli_num_rows($query_result) == 0) {
        return false;
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["email"] = $_POST["email"];
        return true;
    }

    mysqli_close($db_connection);
}

function logout() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    return true;
}

if(!isset($_POST["operation"])) {
    die ("<b>Error:</b> Please specify operation (e.g. login/ logout)");
}

if($_POST["operation"] == "login") {
    if(! isset($_POST['email']) || ! isset($_POST['password'])) {
        die ("<b>Error:</b> Missing credentials");
    }
    echo login();
} else if($_POST["operation"] == "logout") {
    echo logout();
}
?>
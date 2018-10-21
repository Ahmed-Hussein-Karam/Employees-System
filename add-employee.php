<?php

include_once "db-connect.php";

if(! $_POST["full-name"] || ! $_POST["email"] || ! $_POST["mobile"] || ! $_POST["hiring-date"]) {
    die ("<b>Error:</b> Missing employee data");
}

$query = "INSERT INTO Employees (Name, Email, Mobile, HiringDate) VALUES ('" .
         $_POST["full-name"] . "', '" . $_POST["email"] . "', '" .
         $_POST["mobile"] . "', '" . $_POST["hiring-date"] . "')";

if(mysqli_affected_rows($db_connection) == 0) {
    echo "Error";
} else {
    include "home.html";
}


?>
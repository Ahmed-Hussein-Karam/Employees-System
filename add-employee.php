<?php

include_once "db-connect.php";

if(! $_POST["full-name"] || ! $_POST["email"] || ! $_POST["mobile"] || ! $_POST["hiring-date"]) {
    die ("<b>Error:</b> Missing employee data");
}

$query = "INSERT INTO Employees (Name, Email, Mobile, HireDate) VALUES ('" .
         $_POST["full-name"] . "', '" . $_POST["email"] . "', '" .
         $_POST["mobile"] . "', '" . $_POST["hiring-date"] . "')";

if ($db_connection -> query($query) === True) {
    include "home.php";
    die ();
} else {
    echo "<h2>Database error</h2>" .
         "<b>Error:</b> " . $db_connection->error . "<br />";
}

mysqli_close($db_connection);
?>

<!--In case of database error-->
<html>
    <body>
        <a href="home.php">Back</a>
    </body>
</html>
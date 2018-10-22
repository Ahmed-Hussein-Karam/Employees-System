<?php

function addEmployee() {
    include_once "db-connect.php";

    $query = "INSERT INTO Employees (Name, Email, Mobile, HireDate) VALUES ('" .
             $_POST["full-name"] . "', '" . $_POST["email"] . "', '" .
             $_POST["mobile"] . "', '" . $_POST["hire-date"] . "')";

    if ($db_connection -> query($query) === true) {
        echo true;
    } else {
        echo false;
    }

    mysqli_close($db_connection);
}

function updateEmployee() {
    include_once "db-connect.php";

    $query = "UPDATE Employees SET Name='" . $_POST["full-name"] . "', Email='" . $_POST["email"] .
             "', Mobile='" . $_POST["mobile"] . "', HireDate='" . $_POST["hire-date"] .
             "' WHERE ID =" . $_POST["employee-id"];

    if ($db_connection -> query($query) === true) {
        echo true;
    } else {
        echo false;
    }

    mysqli_close($db_connection);
}

function deleteEmployee() {
    include_once "db-connect.php";

    $query = "DELETE FROM Employees WHERE ID=" . $_POST['employee-id'];
    if ($db_connection -> query($query) === true) {
        echo true;
    } else {
        echo false;
    }

    mysqli_close($db_connection);
}

function listEmployees() {
    include_once "db-connect.php";

    $query = "SELECT ID, Name FROM Employees";
    $query_result = mysqli_query($db_connection, $query);

    while($employee = $query_result -> fetch_assoc()){
        echo "<tr><td>" . $employee['Name'] .
             "</td><td><a href='edit-employee.php?employee-id=" . $employee['ID'] . "'>Details</a>" .
             "</td><td><a href='employee-attendance.php?employee-id=" . $employee['ID'] . "&full-name=" .
             $employee['Name'] . "'>Attendance</a>" .
             "</td><td><a href='#' onclick='deleteEmployee(" . $employee['ID'] . ")'>Delete</a>" .
             "</td></tr>";
    }

    mysqli_close($db_connection);
}


if(!isset($_POST["operation"])) {
    die ("<b>Error:</b> Please specify operation (e.g. add/ delete)");
}

if($_POST["operation"] == "add") {
    if(! isset($_POST['full-name']) || ! isset($_POST['email']) || ! isset($_POST['mobile']) ||
       ! isset($_POST['hire-date'])) {
        die ("<b>Error:</b> Missing employee data");
    }
    echo addEmployee();
} else if($_POST["operation"] == "update") {
    if(! isset($_POST['employee-id']) || ! isset($_POST['full-name']) || ! isset($_POST['email']) ||
       ! isset($_POST['mobile']) || ! isset($_POST['hire-date'])) {
        die ("<b>Error:</b> Missing employee data");
    }
    echo updateEmployee();
} else if($_POST["operation"] == "delete") {
    if(! isset($_POST['employee-id'])) {
        die ("<b>Error:</b> Missing employee ID");
    }
    echo deleteEmployee();
} else if($_POST["operation"] == "list") {
    echo listEmployees();
}

?>
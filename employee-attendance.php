<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/data-tables-bootstrap.css">
    </head>

    <body>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(! isset($_SESSION["email"])) {
                die ("<b>Error:</b> You must login first to view this page");
            }
            if(! isset($_GET["employee-id"]) || ! isset($_GET["full-name"])) {
                die ("<b>Error: </b> employee ID or full name parameters missing");
            }

            include_once "navbar.html";
            include_once "db-connect.php";

            echo "<div class='container'>";
            echo "<h2>Attendance for employee: " . $_GET["full-name"] . "</h2>";
            $query = "SELECT Day, Type, WorkingHours FROM Attendance JOIN StatusTypes " .
                     "ON Attendance.StatusTypeID = StatusTypes.ID WHERE Attendance.EmployeeID=" . $_GET["employee-id"];
            $query_result = mysqli_query($db_connection, $query);

            //Attendance table
            $table_opening = "<table id='itbl-attendance' class='table table-striped table-bordered table-hover'><thead><tr><th>Day</th>" .
                             "<th>Type</th><th>Working hours</th></tr></thead><tbody>";
            $table_body = "";
            $table_closing = "</tbody></table>";

            while($attendance_day = $query_result -> fetch_assoc()){
                $table_body .= "<tr><td>" . $attendance_day['Day'] . "</td><td>" . $attendance_day['Type'] .
                               "</td><td>" . $attendance_day["WorkingHours"] . "</td></tr>";
            }

            echo $table_opening . $table_body . $table_closing;
            echo "</div>";

            mysqli_close($db_connection);
        ?>

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/data-tables-jquery.js"></script>
        <script src="javascript/data-tables-bootstrap.js"></script>
        <script src="javascript/logout.js"></script>
        <script src="javascript/employee-attendance.js"></script>
    </body>
</html>
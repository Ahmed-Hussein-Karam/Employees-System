<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/employee-of-the-month.css">
    </head>

    <body>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(! isset($_SESSION["email"])) {
                die ("<b>Error:</b> You must login first to view this page");
            }

            include_once "navbar.html";
            include_once "db-connect.php";

            $query = "SELECT Name FROM Employees JOIN (SELECT EmployeeID, AVG(WorkingHours) AS Score FROM Attendance GROUP BY EmployeeID ORDER BY Score DESC LIMIT 1) AS Winner ON Employees.ID = Winner.EmployeeID";
            $query_result = mysqli_query($db_connection, $query);
            $employee_of_the_month = $query_result -> fetch_assoc();
            echo "<div class='container'><h2>Employee of the month is:</h2>" .
                 "<span id='ispn-winner'>" . $employee_of_the_month["Name"] . "</span></div>";

            mysqli_close($db_connection);
        ?>

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/logout.js"></script>
    </body>
</html>
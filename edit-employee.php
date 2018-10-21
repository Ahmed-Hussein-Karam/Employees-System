<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>

    <body>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(! isset($_SESSION["email"])) {
                die ("<b>Error:</b> You must login first to view this page");
            }
            if(! isset($_GET["employee-id"])) {
                die ("<b>Error: </b> no employee ID provided");
            }

            include_once "navbar.html";
            include_once "db-connect.php";

            $query = "SELECT * FROM Employees WHERE ID = " . $_GET["employee-id"];
            $query_result = mysqli_query($db_connection, $query);

            $employee = $query_result -> fetch_assoc();

            echo "<h2>Update employee data</h2>" .
                "<form id='iform-edit-employee'>" .
                "<label>Full Name: </label><input id='iinp-full-name' class='form-control' type='text' name='full-name' value='" .
                $employee['Name'] ."' required/>" .
                "<label>Email: </label><input id='iinp-email' class='form-control' type='email' name='email' value='" .
                $employee['Email'] ."' required/>" .
                "<label>Mobile: </label><input id='iinp-mobile' class='form-control' type='tel' name='mobile' value='" .
                $employee['Mobile'] ."' required/>" .
                "<label>Hiring date: </label><input id='iinp-hire-date' type='date' name='hiring-date' value='" .
                $employee['HireDate'] ."' required/>" .
                "<input class='form-control btn-primary' type='submit' value='Save changes' /></form>";

            mysqli_close($db_connection);
        ?>

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/logout.js"></script>
        <script src="javascript/edit-employee.js"></script>
    </body>
</html>
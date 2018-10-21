<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/data-tables-bootstrap.css">
    </head>

    <body>

        <?php
            session_start(); 
            if(! isset($_SESSION['email'])) {
                die ("<b>Error:</b> You must login first to view this page");
            }
        ?>
        <nav>
            <ul><a href="logout.php">Logout</a></ul>
        </nav>

        <h2>Employees list</h2>
        <div class="container-fluid">
            <table id="itbl-employees" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include_once "db-connect.php";

                        $query = "SELECT ID, Name FROM Employees";
                        $query_result = mysqli_query($db_connection, $query);

                        while($employee = $query_result -> fetch_assoc()){
                            echo "<tr><td>" . $employee['Name'] .
                            "</td><td><a href='employee-data.php?id=" . $employee['ID'] . "'>View details</a></td><td>";
                        }

                        mysqli_close($db_connection);
                    ?>
                </tbody>
            </table>
        </div><hr />

        <h2>Add an employee</h2>
        <form method="POST" action="add-employee.php">
            <label>Full Name: </label><input class="form-control" type="text" name="full-name" required/>
            <label>Email: </label><input class="form-control" type="email" name="email" required />
            <label>Mobile: </label><input class="form-control" type="tel" name="mobile" required />
            <label>Hiring date: </label><input type="date" name="hiring-date" required />
            <input class="form-control btn-primary" type="submit" value="Add Employee" />
        </form>

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/data-tables-jquery.js"></script>
        <script src="javascript/data-tables-bootstrap.js"></script>
        <script src="javascript/home.js"></script>
    </body>
</html>
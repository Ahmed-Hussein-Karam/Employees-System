<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        <h2>Add Employee</h2>
        <form method="POST" action="add-employee.php">
            <label>Full Name: </label><input class="form-control" type="text" name="full-name" required/>
            <label>Email: </label><input class="form-control" type="email" name="email" required />
            <label>Mobile: </label><input class="form-control" type="tel" name="mobile" required />
            <label>Hiring date: </label><input type="date" name="hiring-date" required />
        </form>

        <hr />
        <h2>Employees list</h2>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
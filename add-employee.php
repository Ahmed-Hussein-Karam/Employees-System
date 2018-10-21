<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/employee-form.css">
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
        ?>

        <div class="container">
            <h2>Add an employee</h2>
            <form id="iform-add-employee">
                <label>Full Name: </label><input id="iinp-name" class="form-control" type="text" required/>
                <label>Email: </label><input id="iinp-email" class="form-control" type="email" required />
                <label>Mobile: </label><input id="iinp-mobile" class="form-control" type="tel" required />
                <label>Hiring date: </label><input id="iinp-date" type="date" required />
                <input class="form-control btn-primary" type="submit" value="Add Employee" />
            </form>
        </div>

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/logout.js"></script>
        <script src="javascript/add-employee.js"></script>
    </body>
</html>
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

            include_once "navbar.html";
        ?>

        <h2>Employees list</h2>
        <div class="container-fluid">
            <table id="itbl-employees" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Employee name</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="itbl-body-employees"></tbody>
            </table>
        </div><hr />

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/data-tables-jquery.js"></script>
        <script src="javascript/data-tables-bootstrap.js"></script>
        <script src="javascript/logout.js"></script>
        <script src="javascript/home.js"></script>
    </body>
</html>
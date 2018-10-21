<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            } 
            if(isset($_SESSION['email'])) { //already logged in
                include "home.php";
                die ();
            }
        ?>

        <div class="container">
            <h2>Login</h2>
            <form id="iform-login">
                <input id="iinp-email" class="form-control" type="email" placeholder="email" name="email" required />
                <input id="iinp-password" class="form-control" type="password" placeholder="password" name="password" required />
                <input class="form-control btn-primary" type="submit" value="Login" />
            </form>
        </div>

        <script src="javascript/jquery.js"></script>
        <script src="javascript/bootstrap.js"></script>
        <script src="javascript/login.js"></script>
    </body>
</html>
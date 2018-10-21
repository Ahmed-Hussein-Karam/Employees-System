<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <body>

        <?php
            session_start(); 
            if(isset($_SESSION['email'])) { //already logged in
                include "home.php";
                die ();
            }
        ?>

        <form method="POST" action="login.php">
            <input class="form-control" type="email" placeholder="email" name="email" required />
            <input class="form-control" type="password" placeholder="password" name="password" required />
            <input class="form-control btn-primary" type="submit" value="Login" />
        </form>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
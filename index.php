<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
    exit();
}
include("connect.php");
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
    </head>
    <body>
    Welcome <?php echo $_SESSION['userid'] ?><br>
    <a href="logout.php"> logout</a>

    </body>
    </html>
<?php


?>
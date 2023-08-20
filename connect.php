<?php

$hostname = "localhost";
$username = 'root';
$password = '';
$dbname = 'ers_db';

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
    echo "db not";
    //die("Connection failed : " . mysqli_connect_error());
}

?>

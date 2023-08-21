<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:../login.php");
    exit();
}


include("../connect.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $query = "SELECT * from admin where email='$email'";

    if (mysqli_num_rows(mysqli_query($con, $query))) {

        $msg[0] = "username or email already taken!";
        $msg[1] = "warning";
    } else {

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $query = "INSERT INTO admin (email,password,role) values('$email','$password','$role')";
        if (!mysqli_query($con, $query)) {

            $msg[0] = "error!";
            $msg[1] = "warning";
        } else {
            $msg[0] = "Successfully added!";
            $msg[1] = "done";
        }
    }


}


?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<h1 class="titlehead">Add admin</h1>
<div class="container">
    <form action="" method="post">
        <?php
        if (isset($msg)) {
            echo "<b class='" . $msg[1] . "'>" . $msg[0] . "</b>";
        }
        ?>
        <div class="formcomp">
            <label for="email">Email: </label>
            <input type="email" name="email" required>
        </div>
        <div class="formcomp">
            <label for="password">Password: </label>
            <input type="password" name="password" required>
        </div>
        <div class="formcomp">
            <label for="role">Role: </label>
            <select name="role">
                <option value="Admin_Exam">Admin_Exam</option>
                <option value="Admin_Student">Admin_Student</option>
            </select>
        </div>
        <div class="formcomp formbutton">
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
    <a href="index.php">
        <button>Dashboard</button>
    </a>

</div>
</body>

</html>
<?php
require('../public/db.inc.php');
session_start();
$msg = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $res = mysqli_query($con, "SELECT * FROM employee WHERE email='$email' AND password='$password'");
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['role'] = $row['role'];
        $_SESSION['USER_ID'] = $row['employeeid'];
        $_SESSION['USER_NAME'] = $row['name'];
        $_SESSION['USER_DEPARTMENT_ID'] = $row['departmentId'];
        header('location:../views/profile.php');
        die();
    } else {
        $msg = "Please enter correct details";
        header('location:../views/login.php?msg=' . $msg);
        die();
    }
}
?>

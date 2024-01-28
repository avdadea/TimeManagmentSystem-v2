<?php
require('../public/db.inc.php');

class ChangePasswordModel {
    public $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function updatePassword($employeeId, $newPassword) {
        $sql = "UPDATE employee SET password='$newPassword' WHERE employeeid='$employeeId'";
        $res = mysqli_query($this->con, $sql);

        if ($res) {
            // Password changed successfully, redirect to profile.php
            header('Location: ../views/profile.php');
            exit; // Make sure to exit after redirect
        } else {
            echo '<div class="alert alert-danger" role="alert">Error changing password. Please try again.</div>';
        }
    }
}
?>

<?php

require('includes/db.inc.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $result = mysqli_query($con, "SELECT medical_document FROM time_off_request WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($row && !empty($row['medical_document'])) {
        header('Content-type: application/pdf');
        echo $row['medical_document'];
    } else {
        echo "No PDF uploaded.";
    }
}
?>

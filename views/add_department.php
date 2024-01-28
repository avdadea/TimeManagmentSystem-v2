<?php
require('includes/top.inc.php');

if ($_SESSION['role'] != 1) {
    
    header('location: profile.php');
    die();
}

$departmentName = '';
$departmentId = '';

if (isset($_GET['departmentId'])) {
    $departmentId = mysqli_real_escape_string($con, $_GET['departmentId']);
    $res = mysqli_query($con, "SELECT * FROM department WHERE departmentId='$departmentId'");
    $row = mysqli_fetch_assoc($res);
    $departmentName = $row['departmentName'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $departmentName = mysqli_real_escape_string($con, $_POST['departmentName']);

    if ($departmentId > 0) {
        $sql = "UPDATE department SET departmentName='$departmentName' WHERE departmentId='$departmentId'";
    } else {
        $sql = "INSERT INTO department(departmentName) VALUES ('$departmentName')";
    }

    mysqli_query($con, $sql);
    header('location: index.php');
    die();
}
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Department</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form method="post">
                            <div class="form-group">
                                <label for="departmentName" class="form-control-label">Department Name</label>
                                <input type="text" value="<?php echo $departmentName ?>" name="departmentName" placeholder="Enter your department name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('includes/footer.inc.php');
?>

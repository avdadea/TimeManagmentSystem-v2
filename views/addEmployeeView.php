<?php
require('includes/top.inc.php');
require('../controllers/addEmployeeController.php');

$controller = new AddEmployeeController($con);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->processForm();
}

$employeeId = isset($_GET['employeeid']) ? $_GET['employeeid'] : 0;
$employeeData = $employeeId > 0 ? $controller->getEmployeeData($employeeId) : ['name' => '', 'email' => '', 'departmentId' => ''];


?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add Manager</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form method="post">
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input type="text" value="<?php echo $employeeData['name'] ?>" name="name"
                                    placeholder="Enter employee name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" value="<?php echo $employeeData['email'] ?>" name="email"
                                    placeholder="Enter employee email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" placeholder="Enter employee password"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Department</label>
                                <select name="departmentId" required class="form-control">
                                    <option value="">Select Department!</option>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM department ORDER BY departmentId DESC");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if ($employeeData['departmentId'] == $row['departmentId']) {
                                            echo "<option selected='selected' value=" . $row['departmentId'] . ">" . $row['departmentName'] . "</option>";
                                        } else {
                                            echo "<option value=" . $row['departmentId'] . ">" . $row['departmentName'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <?php if ($_SESSION['role'] == 1) { ?>
                            <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <?php } ?>
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

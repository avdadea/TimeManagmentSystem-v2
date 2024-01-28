<?php
require('../models/createTimeOffModel.php');

class CreateTimeOffController {
    private $model;

    public function __construct($con) {
        $this->model = new CreateTimeOffModel($con);
    }

    public function processTimeOffRequestForm() {
        if (isset($_POST['submit'])) {
            $leaveType = mysqli_real_escape_string($this->model->getCon(), $_POST['leave_type']);
            $startDate = mysqli_real_escape_string($this->model->getCon(), $_POST['startdate']);
            $endDate = mysqli_real_escape_string($this->model->getCon(), $_POST['enddate']);
            $employeeId = $_SESSION['USER_ID'];
            $reason = mysqli_real_escape_string($this->model->getCon(), $_POST['reason']);

            $medicalDocument = '';
            if ($_FILES['medical_document']['error'] == UPLOAD_ERR_OK) {
                $medicalDocument = file_get_contents($_FILES['medical_document']['tmp_name']);
            }

            $this->model->addTimeOffRequest($leaveType, $startDate, $endDate, $employeeId, $reason, $medicalDocument);

            header('location: time_off_request.php');
            die();
        }
    }
}
?>

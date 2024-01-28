<?php
require('../models/timeOffModel.php');

class TimeOffController {
    private $model;

    public function __construct($con) {
        $this->model = new TimeOffModel($con);
    }

    public function processRequests($role, $userId, $departmentId = null) {
        if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id'])) {
            $id = mysqli_real_escape_string($this->model->con, $_GET['id']);
            $this->model->deleteTimeOffRequest($id);
        }

        if (isset($_GET['type']) && $_GET['type'] == 'update' && isset($_GET['id'])) {
            $id = mysqli_real_escape_string($this->model->con, $_GET['id']);
            $status = mysqli_real_escape_string($this->model->con, $_GET['status']);
            $this->model->updateTimeOffRequestStatus($id, $status);
        }

        $requests = $this->model->getTimeOffRequests($role, $userId, $departmentId);

        return $requests;
    }
}
?>

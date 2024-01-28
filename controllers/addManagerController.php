<?php
require('../models/addManagerModel.php');

class AddManagerController {
    private $model;

    public function __construct($con) {
        $this->model = new AddManagerModel($con);
    }

    public function processForm() {
        if (isset($_POST['submit'])) {
            $employeeId = isset($_GET['employeeid']) ? $_GET['employeeid'] : 0;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $departmentId = $_POST['departmentId'];

            if ($employeeId > 0) {
                $this->model->updateEmployee($employeeId, $name, $email, $password, $departmentId);
            } else {
                $this->model->addEmployee($name, $email, $password, $departmentId);
            }

            header('location: manager.php');
            die();
        }
    }

    public function getEmployeeData($employeeId) {
        return $this->model->getEmployeeById($employeeId);
    }
}
?>

<?php
class AddManagerModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getEmployeeById($employeeId) {
        $employeeId = mysqli_real_escape_string($this->con, $employeeId);
        $res = mysqli_query($this->con, "SELECT * FROM employee WHERE employeeid='$employeeId'");
        return mysqli_fetch_assoc($res);
    }

    public function updateEmployee($employeeId, $name, $email, $password, $departmentId) {
        $employeeId = mysqli_real_escape_string($this->con, $employeeId);
        $name = mysqli_real_escape_string($this->con, $name);
        $email = mysqli_real_escape_string($this->con, $email);
        $password = mysqli_real_escape_string($this->con, $password);
        $departmentId = mysqli_real_escape_string($this->con, $departmentId);

        $sql = "UPDATE employee SET name='$name', email='$email', password='$password', departmentId='$departmentId' WHERE employeeid='$employeeId'";
        mysqli_query($this->con, $sql);
    }

    public function addEmployee($name, $email, $password, $departmentId) {
        $name = mysqli_real_escape_string($this->con, $name);
        $email = mysqli_real_escape_string($this->con, $email);
        $password = mysqli_real_escape_string($this->con, $password);
        $departmentId = mysqli_real_escape_string($this->con, $departmentId);

        $sql = "INSERT INTO employee(name, email, password, departmentId, role) VALUES ('$name', '$email', '$password', '$departmentId', 3)";
        mysqli_query($this->con, $sql);
    }
}
?>

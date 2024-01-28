<?php

class TimeOffModel {
    public $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getTimeOffRequests($role, $userId, $departmentId = null) {
        if ($role == 1) {
            $sql = "SELECT tor.*, employee.name
                    FROM `time_off_request` tor
                    JOIN employee ON tor.employee_id = employee.employeeid
                    ORDER BY tor.id DESC";
        } elseif ($role == 3) {
            $sql = "SELECT tor.*, employee.name
                    FROM `time_off_request` tor
                    JOIN employee ON tor.employee_id = employee.employeeid
                    WHERE employee.departmentId = '$departmentId'
                    ORDER BY tor.id DESC";
        } else {
            $sql = "SELECT tor.*, employee.name
                    FROM `time_off_request` tor
                    JOIN employee ON tor.employee_id = employee.employeeid
                    WHERE tor.employee_id = '$userId'
                    ORDER BY tor.id DESC";
        }
    
        $res = mysqli_query($this->con, $sql);
    
        return $res;
    }

    public function deleteTimeOffRequest($id) {
        mysqli_query($this->con, "DELETE FROM `time_off_request` WHERE id='$id'");
    }

    public function updateTimeOffRequestStatus($id, $status) {
        mysqli_query($this->con, "UPDATE `time_off_request` SET status='$status' WHERE id='$id'");
    }
}
?>

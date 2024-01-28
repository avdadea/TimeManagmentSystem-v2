<?php

class CreateTimeOffModel {
    public $con;

    public function __construct($con) {
        $this->con = $con;
    }
    public function getCon() {
        return $this->con;
    }

    public function addTimeOffRequest($leaveType, $startDate, $endDate, $employeeId, $reason, $medicalDocument) {
        $sql = "INSERT INTO `time_off_request` (leave_type, startdate, enddate, employee_id, reason, medical_document, status)
                VALUES (?, ?, ?, ?, ?, ?, 1)";

        $stmt = mysqli_prepare($this->con, $sql);

        mysqli_stmt_bind_param($stmt, 'ssssss', $leaveType, $startDate, $endDate, $employeeId, $reason, $medicalDocument);

        mysqli_stmt_execute($stmt);
    }
}
?>

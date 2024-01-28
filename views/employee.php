<?php

require('includes/top.inc.php');
require('../controllers/EmployeeController.php');

$employeeController = new EmployeeController($con);
$employeeController->handleRequest();

require('includes/footer.inc.php');
?>

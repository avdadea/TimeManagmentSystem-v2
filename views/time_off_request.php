<?php
require('includes/top.inc.php');
require('../controllers/TimeOffController.php');
require('TimeOffView.php');

$role = $_SESSION['role'];
$userId = $_SESSION['USER_ID'];
$departmentId = $_SESSION['USER_DEPARTMENT_ID'] ?? null;

$controller = new TimeOffController($con);
$requests = $controller->processRequests($role, $userId, $departmentId);

$view = new TimeOffView();
$view->renderTimeOffRequests($requests, $role);

require('includes/footer.inc.php');
?>


<?php
require('../views/includes/top.inc.php');
require('../models/DepartmentModel.php');
require('../views/DepartmentView.php');
require('../controllers/DepartmentController.php');




$departmentModel = new DepartmentModel($con);
$departmentView = new DepartmentView();
$departmentController = new DepartmentController($con, $departmentModel, $departmentView);

$departmentController->handleRequest();

require('includes/footer.inc.php');

<?php
require('includes/top.inc.php');
require('../controllers/createTimeOffController.php');
require('../views/createTimeOffView.php');

$createTimeOffController = new CreateTimeOffController($con);
$createTimeOffView = new CreateTimeOffView();

$createTimeOffController->processTimeOffRequestForm();
$createTimeOffView->renderTimeOffRequestForm();

require('includes/footer.inc.php');
?>

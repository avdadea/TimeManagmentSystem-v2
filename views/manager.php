<?php

require('includes/top.inc.php');
require('../controllers/ManagerController.php');

$managerController = new ManagerController($con);
$managerController->handleRequest();

require('includes/footer.inc.php');
?>

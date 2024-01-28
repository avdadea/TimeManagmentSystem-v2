<?php
require('../controllers/logoutController.php');

$logoutController = new LogoutController();
$logoutController->logout();
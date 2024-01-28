<?php

require_once('../models/logoutModel.php');

class LogoutController {
    private $logoutModel;

    public function __construct() {
        $this->logoutModel = new LogoutModel();
    }

    public function logout() {
        $this->logoutModel->performLogout();
        header('Location: ../views/login.php');
        exit();
    }
}

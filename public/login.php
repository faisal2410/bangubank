<?php
require '../src/init.php';

use App\Controllers\LoginController;

$controller = new LoginController();
$controller->login();

include '../src/views/login.php';

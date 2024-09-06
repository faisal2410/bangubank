<?php
require '../src/init.php';

use App\Controllers\AdminController;

$controller = new AdminController();
$controller->viewUsers();

<?php
require '../src/init.php';

use App\Controllers\CustomerController;

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$controller = new CustomerController();
$controller->transfer($_POST['amount'], $_POST['toEmail']);

header('Location: dashboard.php');

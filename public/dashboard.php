<?php
require '../src/init.php';

use App\Controllers\CustomerController;

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$controller = new CustomerController();
$balance = $controller->getBalance();
$transactions = $controller->viewTransactions();

include '../src/views/dashboard.php';

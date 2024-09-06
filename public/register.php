<?php
require '../src/init.php';

use App\Controllers\RegisterController;

$controller = new RegisterController();
$controller->register();

include '../src/views/register.php';

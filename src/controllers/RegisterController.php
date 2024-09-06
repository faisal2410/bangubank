<?php

namespace App\Controllers;

use App\Models\Storage;
use App\Models\User;

class RegisterController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User($name, $email, $password);
            $storage = new Storage();
            $storage->saveUser($user);

            header('Location: login.php');
        }
    }
}

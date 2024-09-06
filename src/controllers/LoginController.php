<?php

namespace App\Controllers;

use App\Models\Storage;

class LoginController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $storage = new Storage();
            $users = $storage->getUsers();

            foreach ($users as $user) {
                if ($user['email'] === $email && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: dashboard.php');
                    exit();
                }
            }

            echo 'Invalid email or password';
        }
    }
}

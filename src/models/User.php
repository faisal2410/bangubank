<?php

namespace App\Models;

class User
{
    private $name;
    private $email;
    private $password;
    private $balance;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->balance = 0;
    }

    // Getters and setters
}

<?php

namespace App\Controllers;

use App\Models\Storage;

class AdminController
{
    public function viewAllTransactions()
    {
        $storage = new Storage();
        $transactions = $storage->getTransactions();
        include 'src/views/admin_transactions.php';
    }

    public function viewUsers()
    {
        $storage = new Storage();
        $users = $storage->getUsers();
        include 'src/views/admin_users.php';
    }

    public function searchTransactionsByEmail($email)
    {
        $storage = new Storage();
        $transactions = $storage->getTransactions();
        $userTransactions = array_filter($transactions, function ($transaction) use ($email) {
            return $transaction['from'] === $email || $transaction['to'] === $email;
        });
        include 'src/views/admin_user_transactions.php';
    }
}

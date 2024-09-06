<?php

namespace App\Controllers;

use App\Models\Storage;
use App\Models\Transaction;

class CustomerController
{
    public function deposit($amount)
    {
        session_start();
        $user = $_SESSION['user'];
        $user['balance'] += $amount;

        $transaction = new Transaction($amount, 'deposit', $user['email']);
        $storage = new Storage();
        $storage->saveTransaction($transaction);
        $storage->saveUser($user);

        $_SESSION['user'] = $user;
    }

    public function withdraw($amount)
    {
        session_start();
        $user = $_SESSION['user'];

        if ($user['balance'] >= $amount) {
            $user['balance'] -= $amount;

            $transaction = new Transaction($amount, 'withdraw', $user['email']);
            $storage = new Storage();
            $storage->saveTransaction($transaction);
            $storage->saveUser($user);

            $_SESSION['user'] = $user;
        } else {
            echo 'Insufficient balance';
        }
    }

    public function transfer($amount, $toEmail)
    {
        session_start();
        $user = $_SESSION['user'];

        if ($user['balance'] >= $amount) {
            $storage = new Storage();
            $users = $storage->getUsers();

            foreach ($users as &$toUser) {
                if ($toUser['email'] === $toEmail) {
                    $user['balance'] -= $amount;
                    $toUser['balance'] += $amount;

                    $transaction = new Transaction($amount, 'transfer', $user['email'], $toEmail);
                    $storage->saveTransaction($transaction);
                    $storage->saveUser($user);
                    $storage->saveUser($toUser);

                    $_SESSION['user'] = $user;
                    return;
                }
            }

            echo 'Recipient not found';
        } else {
            echo 'Insufficient balance';
        }
    }

    public function viewTransactions()
    {
        session_start();
        $user = $_SESSION['user'];
        $storage = new Storage();
        $transactions = $storage->getTransactions();
        $userTransactions = array_filter($transactions, function ($transaction) use ($user) {
            return $transaction['from'] === $user['email'] || $transaction['to'] === $user['email'];
        });
        include 'src/views/customer_transactions.php';
    }

    public function getBalance()
    {
        session_start();
        $user = $_SESSION['user'];
        echo 'Current balance: ' . $user['balance'];
    }
}

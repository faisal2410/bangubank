<?php
namespace App\Models;

class Storage
{
private $usersFile = 'storage/users.json';
private $transactionsFile = 'storage/transactions.json';

public function saveUser(User $user)
{
$users = $this->getUsers();
$users[] = $user;
file_put_contents($this->usersFile, json_encode($users));
}

public function getUsers()
{
return json_decode(file_get_contents($this->usersFile), true) ?? [];
}

public function saveTransaction(Transaction $transaction)
{
$transactions = $this->getTransactions();
$transactions[] = $transaction;
file_put_contents($this->transactionsFile, json_encode($transactions));
}

public function getTransactions()
{
return json_decode(file_get_contents($this->transactionsFile), true) ?? [];
}
}
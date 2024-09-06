<?php

namespace App\Models;

class Transaction
{
    private $amount;
    private $type;
    private $timestamp;
    private $from;
    private $to;

    public function __construct($amount, $type, $from, $to = null)
    {
        $this->amount = $amount;
        $this->type = $type;
        $this->timestamp = time();
        $this->from = $from;
        $this->to = $to;
    }

    // Getters and setters
}

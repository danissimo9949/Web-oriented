<?php

abstract class PaymentHandler 
{
    protected $nextHandler;

    public function setNext(PaymentHandler $handler): PaymentHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    abstract public function handle($amount);
}


class PrimaryAccountHandler extends PaymentHandler 
{
    private $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function handle($amount)
    {
        if ($this->balance >= $amount) {
            echo "Оплата здійснена з основного рахунку.\n";
        } elseif ($this->nextHandler) {
            $this->nextHandler->handle($amount);
        } else {
            echo "Оплату відхилено: недостатньо коштів на рахунку.\n";
        }
    }
}

class CreditAccountHandler extends PaymentHandler 
{
    private $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function handle($amount)
    {
        if ($this->balance >= $amount) {
            echo "Оплата здійснена з кредитного рахунку.\n";
        } elseif ($this->nextHandler) {
            $this->nextHandler->handle($amount);
        } else {
            echo "Оплату відхилено: недостатньо коштів на рахунку.\n";
        }
    }
}


$primaryAccount = new PrimaryAccountHandler(1000);
$creditAccount = new CreditAccountHandler(2000);

$primaryAccount->setNext($creditAccount);

$purchaseAmount = 1500;
$primaryAccount->handle($purchaseAmount);
<?php

interface Payment
{
    public function pay(): void;

}

class PaypalPayment implements Payment
{
    public function pay(): void
    {
        var_dump('paypal');
    }
}

class CreditCardPayment implements Payment
{
    public function pay(): void
    {
        var_dump('cc');
    }
}

class FreePayment implements Payment
{
    public function pay(): void
    {
        var_dump('wohoo Its free!');
    }
}


class Application
{
    public function run(): void
    {
        $paymentMethod = readline ('Enter payment method: ');
        $payment = null;

        switch ($paymentMethod)
        {
            case 'pp':
                $payment = new PaypalPayment;
                break;
            case 'cc':
                $payment = new CreditCardPayment;
                break;
            default:
                $payment = new FreePayment;
                break;
        }

        $this->executePayment($payment);
    }

    public function executePayment(Payment $payment)
    {
        $payment->pay();
    }
}

(new Application())->run();



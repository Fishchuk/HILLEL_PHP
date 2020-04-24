<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

abstract class PaySystem
{
    abstract public function getPaySystem(): SystemPayConnector;

    public function PaymentSystem ()
    {
        $PaymentSystem = $this->getPaySystem();
        $PaymentSystem->logIn();
        $PaymentSystem->PaymentSystem();
    }
}

class Visa extends PaySystem
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getPaySystem(): SystemPayConnector
    {
        return new VisaConnector($this->login, $this->password);
    }
}

class MasterCard extends PaySystem
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getPaySystem(): SystemPayConnector
    {
        return new MasterCardConnector($this->email, $this->password);
    }
}

interface SystemPayConnector
{
    public function logIn(): void;

    public function PaymentSystem(): void;
}

class VisaConnector implements SystemPayConnector
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Пользователь $this->login с " .
            "паролем $this->password\n";
    }

    public function PaymentSystem(): void
    {
        echo "Оплатить с помощью Visa.<br>";
    }
}

class MasterCardConnector implements SystemPayConnector
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Пользователь $this->email с " .
            "паролем $this->password\n";
    }

    public function PaymentSystem(): void
    {
        echo "Оплатить с помощью MasterCard.<br>";
    }
}
function client(PaySystem $PaySystem)
{
    $PaySystem->PaymentSystem();
}


echo " Visa:<pre>";
client(new Visa("Emma Swan", "******"));
echo "</pre>";

echo " MasterCard:<pre>";
client(new MasterCard ("emmaswan@email.com", "******"));
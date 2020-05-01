<?php

class Contact{
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;

    public function __construct($name,$surname,$email,$phone,$address)
    {
        $this->name =$name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }
}

$contact = new Contact();
$newContact = $contact-> phone('800-000-000')
                      ->name("Meredit")
                      ->surname("Grey")
                      ->email("meredit.grey@email.com")
                      ->address("Seattle")
                      ->build();
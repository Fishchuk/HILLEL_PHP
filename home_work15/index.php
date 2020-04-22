<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

Interface UserContact
{
    public function setName(string $name): UserContact;
	public function setSurname(string $surname): UserContact;
	public function setEmail(string $email): UserContact;
	public function setPhone(string $phone): UserContact;
	public function setAddress(string $address): UserContact;
	public function getUser(): string;
}

class User implements UserContact
{
    protected $name;
    protected $surname;
    protected $email;
    protected $phone;
    protected $address;

    public function setName(string $name): UserContact
    {
        $this->name=$name;
        return $this;
    }
    public function setSurname(string $surname): UserContact
    {
        $this->surname=$surname;
        return $this;
    }
    public function setEmail(string $email): UserContact
    {
        $this->email=$email;
        return $this;
    }
    public function setPhone(string $phone): UserContact
    {
        $this->phone=$phone;
        return $this;
    }
    public function setAddress(string $address): UserContact
    {
        $this->address=$address;
        return $this;
    }
    public function getUser(): string
    {
        $out=" User information<br>";
        if ($this->name)
            $out.="Name : $this->name <br>";
        if ($this->surname)
            $out.="Surname : $this->surname <br>";
        if ($this->email)
            $out.="Email : $this->email <br>";
        if ($this->phone)
            $out.="Phone : $this->phone <br>";
        if ($this->address)
            $out.="Adress : $this->address <br>";
        return $out;
    }
}
$user1=new User;
$user2=new User;
echo "<br>";
echo $user1->setName("Meredit")
    ->setSurname("Grey")
    ->setAddress("Seattle")
    ->setPhone("08009990000")
    ->setEmail('meredit.grey@email.com')
    ->getUser();
echo "<br>";
echo $user2->setName("Emma")
    ->setSurname("Swan")
    ->setAddress("New-York")
    ->setPhone("08001230000")
    ->setEmail('emma.swan@email.com')
    ->getUser();
echo "<br>";
?>
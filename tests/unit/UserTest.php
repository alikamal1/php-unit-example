<?php

class UserTest extends \PHPUnit\Framework\TestCase 
{
    
    public function testThatWeCanGetTheFirstName()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Ali");

        $this->assertEquals($user->getFirstName(), "Ali");
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new \App\Models\User;
        $user->setLastName("Kamal");

        $this->assertEquals($user->getLastName(), "Kamal");
    }

    public function testFullNameIsReturned()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Ali");
        $user->setLastName("Kamal");

        $this->assertEquals($user->getFullName(), "Ali Kamal");
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new \App\Models\User;
        $user->setFirstName(" Ali       ");
        $user->setLastName("        Kamal   ");

        $this->assertEquals($user->getFirstName(), "Ali");
        $this->assertEquals($user->getLastName(), "Kamal");
    }

    public function testEmailAddressCanBeSet()
    {
        $email = 'email@example.com';
        $user = new \App\Models\User;
        $user->setEmail($email);

        $this->assertEquals($user->getEmail(), $email);
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Ali");
        $user->setLastName("Kamal");
        $user->setEmail('email@example.com');
        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        $this->assertEquals($emailVariables['full_name'], 'Ali Kamal');
        $this->assertEquals($emailVariables['email'], 'email@example.com');
    }

}
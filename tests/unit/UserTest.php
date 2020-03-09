<?php

class UserTest extends \PHPUnit\Framework\TestCase 
{

    /** @test */
    public function that_we_can_get_the_firstName()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Ali");

        $this->assertEquals($user->getFirstName(), "Ali");
    }

    /** @test */
    public function we_can_get_the_lastName()
    {
        $user = new \App\Models\User;
        $user->setLastName("Kamal");

        $this->assertEquals($user->getLastName(), "Kamal");
    }

    /** @test */
    public function full_name_is_returned()
    {
        $user = new \App\Models\User;
        $user->setFirstName("Ali");
        $user->setLastName("Kamal");

        $this->assertEquals($user->getFullName(), "Ali Kamal");
    }

    /** @test */
    public function first_and_last_name_are_trimmed()
    {
        $user = new \App\Models\User;
        $user->setFirstName(" Ali       ");
        $user->setLastName("        Kamal   ");

        $this->assertEquals($user->getFirstName(), "Ali");
        $this->assertEquals($user->getLastName(), "Kamal");
    }

    /** @test */
    public function email_address_can_be_set()
    {
        $email = 'email@example.com';
        $user = new \App\Models\User;
        $user->setEmail($email);

        $this->assertEquals($user->getEmail(), $email);
    }

    /** @test */
    public function email_variables_contain_correct_values()
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
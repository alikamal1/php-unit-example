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

}
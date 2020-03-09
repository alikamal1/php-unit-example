<?php

class SampleTest extends \PHPUnit\Framework\TestCase 
{
    public function testTrueAssertToTrue()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }
}
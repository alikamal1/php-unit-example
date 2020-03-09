# php-unit-example
a simple php unit test example

```
composer require phpunit/phpunit
composer dump-autoload -o

$this->assertEquals() // compare two values
$this->assertArrayHasKey() // check if array has key
setUp() // run at each test function to create an object from model
/** @test */ on top of function instead of test_ prefix
$this->assertEmpty() // check if empty 
$this->assertCount() // check the count
$this->assertInstanceOf() // check if object is an intance of specific class
$this->assertIsString() // check internal type of an instance
$this->expectException(); // check if exception happen
```
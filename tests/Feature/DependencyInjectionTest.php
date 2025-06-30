<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DependencyInjectionTest extends TestCase
{
    
    public function testDependencyInjectionTest()
    {
        // pakai construction lebih di rekomendasikan
        $foo = new Foo();
        $bar = new Bar($foo);
        // $bar->setFoo($foo);
        // $bar->foo = $foo;

        self::assertEquals('foo and Bar', $bar->bar());
    }
}

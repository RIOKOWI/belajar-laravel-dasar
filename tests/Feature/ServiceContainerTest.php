<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceContainerTest extends TestCase
{
    
    public function testDependencyInjection()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("foo", $foo1->foo());
        self::assertEquals("foo", $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }


    //untuk yang lebih kompleks
    public function testBind()
    {
        $this->app->bind(Person::class, function ($app) {
            return new Person("Rio", "Achyar");
        });

        $person1 = $this->app->make(Person::class); // closure() // new Person("Rio", "Achyar");
        $person2 = $this->app->make(Person::class); // closure() // new Person("Rio", "Achyar");

        self::assertEquals('Rio', $person1->firstName);
        self::assertEquals('Rio', $person1->firstName);
        self::assertNotSame($person1, $person2);// objek tidak sama walupun isi sama
    }

    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Rio", "Achyar");
        });

        $person1 = $this->app->make(Person::class); // new Person("Rio", "Achyar"); if not exist
        $person2 = $this->app->make(Person::class); // return existing

        self::assertEquals('Rio', $person1->firstName);
        self::assertEquals('Rio', $person1->firstName);
        self::assertSame($person1, $person2); //objek yang sama
    }

    // seperti singleton tetapi object nya buat sendiri
    public function testInstance()
    {
        $person = new Person("Rio", "Achyar");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); 
        $person2 = $this->app->make(Person::class); 

        self::assertEquals('Rio', $person1->firstName);
        self::assertEquals('Rio', $person2->firstName); 
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
        self::assertSame($person, $person2);
    }

    public function testDependecy(){
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        self::assertSame($foo, $bar->foo);
        
    }

    public function testDependecyInjectionClosure(){
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class)); //ambil foo yang diatasnya
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $bar->foo);
        self::assertSame($bar1, $bar2);
        self::assertNotSame($foo, $bar);
        self::assertEquals($foo, $bar->foo);
        
    }
}

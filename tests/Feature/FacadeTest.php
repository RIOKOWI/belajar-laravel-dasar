<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use SebastianBergmann\CodeUnit\FunctionUnit;

class FacadeTest extends TestCase
{
    
    public function testFacade()
    {
        $firstname1 = config("contoh.author.first");
        $firstname2 = Config::get("contoh.author.first");

        self::assertEquals($firstname1, $firstname2);

        // var_dump(Config::all());
    }

    public function testDependencyConfig()
    {
        $config = $this->app->make("config");
        $firstname3 = $config->get("contoh.author.first");

        $firstname1 = config("contoh.author.first");
        $firstname2 = Config::get("contoh.author.first");

        self::assertEquals($firstname1, $firstname2);
        self::assertEquals($firstname1, $firstname3);
        // var_dump($config->all());
    }


    // MOCK
    public function testFacadeMock()
    {
        Config::shouldReceive('get')
        ->with('contoh.author.first')
        ->andReturn("Rio Keren sial");

        $firstname1 = Config::get("contoh.author.first");

        self::assertEquals("Rio Keren sial", $firstname1);
    }
}

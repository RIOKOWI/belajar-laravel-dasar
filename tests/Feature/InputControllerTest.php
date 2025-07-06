<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    
    public function testInput()
    {
        $this->get('/input/hello?name=rio')->assertSeeText("Hello rio");
        $this->post('/input/hello', ['name' => 'achyar'])->assertSeeText("Hello achyar");
    }

    // NESTED INPUT
    public function testNestedInput()
    {
        $this->post('/input/hola', [
            'name' => [
                'first' => 'rio',
                'last' => 'achyar'
                ]
                ])->assertSeeText("Hola rio achyar");
    }

    public function testAllInput()
    {
        $this->post('/input/hello/input', [
            'name' => [
                'first' => 'ucok',
                'last' => 'baba'
            ]
        ])->assertSeeText("name")->assertSeeText("first")->assertSeeText("ucok")
        ->assertSeeText("last")->assertSeeText("baba");
    }

    public function testHelloArray()
    {
        $this->post('/input/hello/array', [
            'products' => [
                [
                    'name' => 'Samsung M15 5G',
                    'price' => 2600000
                ],
                [
                    'name' => 'Galaxy Buds FE',
                    'price' => 600000
                ]
            ]
        ])->assertSeeText("Samsung M15 5G")->assertSeeText("Galaxy Buds FE");
    }
}

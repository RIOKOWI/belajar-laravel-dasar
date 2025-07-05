<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    
    public function testController()
    {
        $this->get('/controller/halo')->assertSeeText("Hello World");
    }

    public function testHelloService()
    {
        $this->get('controller/hello/rio')
        ->assertSeeText("Halo rio");
    }

    public function testRequest()
    {
        $this->get('/controller/hello/request', ["Accept" => "plain/text"])
        ->assertSeeText("/controller/hello/request")
        ->assertSeeText("http://localhost/controller/hello/request")
        ->assertSeeText("GET")
        ->assertSeeText("plain/text");
    }
}

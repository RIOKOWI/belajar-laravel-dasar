<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    
    public function testResponse()
    {
        $this->get('/response')->assertStatus(200)->assertSeeText("Hello response");
    }

    public function testHeader()
    {
        $this->get('/response/header')
        ->assertStatus(200)
        ->assertSeeText('Rio')->assertSeeText('Achyar')
        ->assertHeader('content-type', 'application/json')
        ->assertHeader('Author', 'Rio Achyar')
        ->assertHeader('App', 'Belajar Laravel');
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    
    public function testInvalid()
    {
        $this->get('/middleware/api')
        ->assertStatus(401)
        ->assertSeeText('access denied');
    }

    public function testValid()
    {
        $this->withHeader('X-API-KEY', 'RIO')
        ->get('/middleware/api')
        ->assertStatus(200)
        ->assertSeeText('OK');
    }

    public function testInvalidGroup()
    {
        $this->get('/middleware/group')
        ->assertStatus(401)
        ->assertSeeText('access denied');
    }

    public function testValidGroup()
    {
        $this->withHeader('X-API-KEY', 'RIO')
        ->get('/middleware/group')
        ->assertStatus(200)
        ->assertSeeText('GROUP');
    }
}

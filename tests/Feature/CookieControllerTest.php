<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    
    public function testCreateCookie()
    {
        $this->get('/cookie/set')
        ->assertCookie('User-Id', 'Rio Achyar')
        ->assertCookie('Is-Member', true);
    }

    public function testGetCookie()
    {
        $this->withCookie('User-Id', 'Rio Achyar')
        ->withCookie('Is-Member', true)
        ->get('/cookie/get')
        ->assertJson([
            'userId' => 'Rio Achyar',
            'isMember' => true
        ]);
    }

    public function testClearCookie()
    {
        $this->get('/cookie/clear')
        ->assertCookie('User-Id')
        ->assertCookie('Is-Member');
    }
}

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
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    
    public function testSession()
    {
        $this->get('/session/create')
        ->assertSeeText("OK")
        ->assertSessionHas("userId", 'rio')
        ->assertSessionHas("isMember", true);
    }

    public function testGetSession()
    {
        $this->withSession(['userId' => 'rio', 'isMember' => true])->get('/session/get')
        ->assertSeeText("rio")
        ->assertSeeText(true);
    }

    public function testGetSessionFailed()
    {
        $this->get('/session/get')
        ->assertSeeText("guest")
        ->assertSeeText("false");
    }
}

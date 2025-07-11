<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    
    public function testRedirectTo()
    {
        $this->get('/redirect/to')
        ->assertSeeText('Redirect To');
    }
    
    public function testRedirectFrom()
    {
        $this->get('/redirect/from')
        ->assertRedirect('/redirect/to');
    }
    
    public function testRedirectHello()
    {
        $this->get('/redirect/name')
        ->assertRedirect('/redirect/name/rio');
        
    }

    public function testRedirectController()
    {
        $this->get('/redirect/action')
        ->assertRedirect('/redirect/name/rio');
        
    }
    
    public function testExternalDomain()
    {
        $this->get('/redirect/external')
        ->assertRedirect('www.rioganteng.com');
    }

}

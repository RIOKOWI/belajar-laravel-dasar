<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    
    public function testBasicRouting()
    {
        //mengacu ke file web.php
        $this->get("/rio")
            ->assertStatus(200)
            ->assertSeeText("Rio Ganteng Bgt");
    }

    public function testRedirect()
    {
        //mengacu ke file web.php
        $this->get("/instagram")
            ->assertRedirect('/rio');
    }

    public function testFallback()
    {
        //mengacu ke file web.php
        $this->get("/404")
            ->assertSeeText('404 DONGO LUWH');
    }

}

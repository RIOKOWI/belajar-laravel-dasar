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

    // ROUTE PARAMETER
    public function testRouteParameter()
    {
        $this->get("/products/1")
        ->assertSeeText("Product : 1");

        $this->get("/products/2")
        ->assertSeeText("Product : 2");


        $this->get("/products/1/items/2")
        ->assertSeeText("Product : 1", " Item : 2");

        $this->get("/products/1/items/RIO")
        ->assertSeeText("Product : 1", " Item : RIO");
    }

    public  function testRouteParameterRegex()
    {
        $this->get("categories/12rio")
        ->assertSeeText("Category : 12rio");
    }

    public function testOptionalRoute()
    {
        $this->get("users/1")
        ->assertSeeText("User : 1");

        $this->get("users")
        ->assertSeeText("404");
    }

    public function testRouteConflict()
    {
        $this->get('conflicts/embud')
        ->assertSeeText("Conflict embud bud bud");
    }

}

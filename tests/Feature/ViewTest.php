<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/hello')
        ->assertSeeText("Hello Cak Rio Achyar");

        $this->get('/hellocuk')
        ->assertSeeText("Hello Cak Rio Achyar");
    }

    public function testNestedView()
    {
        $this->get('/world')
        ->assertSeeText("Hallo Rio Achyar");

        $this->get('/world1')
        ->assertSeeText("Hallo Rio Achyar");
    }

    //mengirim data ke view tanpa routing
    public function testViewWithoutRoute()
    {
        $this->view('hello', ['name' => 'Rio Achyar'])
        ->assertSeeText("Hello Cak Rio Achyar");

        $this->view('hello.world', ['name' => 'Rio Achyar'])
        ->assertSeeText("Hallo Rio Achyar");
    }



}

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

    //RESPON TYPE
    public function testView()
    {
        $this->get('/response/view')
        ->assertStatus(200)
        ->assertSeeText('Rio Achyar');
    }

    public function testJson()
    {
        $this->get('/response/json')
        ->assertJson(['firstName' => 'Rio', 'lastName '=> 'Achyar']);
    }

    // RESPON FILE DAN DOWNLOAD
    public function testFile()
    {
        $this->get('/response/file')
        ->assertHeader('Content-type', 'image/jpeg');
    }

    public function testDownload()
    {
        $this->get('/response/download')
        ->assertDownload("1.jpg");
    }
}


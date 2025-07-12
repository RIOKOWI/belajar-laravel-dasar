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

    // ROUTE GROUP
    public function testViewGroup()
    {
        $this->get('/response/type/view')
        ->assertStatus(200)
        ->assertSeeText('Rio Achyar');
    }

    public function testJsonGroup()
    {
        $this->get('/response/type/json')
        ->assertJson(['firstName' => 'Rio', 'lastName '=> 'Achyar']);
    }

    
    public function testFileGroup()
    {
        $this->get('/response/type/file')
        ->assertHeader('Content-type', 'text/html; charset=UTF-8');
    }

    public function testDownloadGroup()
    {
        $this->get('/response/type/download')
        ->assertDownload("1.jpg");
    }
}


<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function testInvalidParam()
    {
        $this->get('/middleware/param')
        ->assertStatus(401)
        ->assertSeeText('access denied');
    }
    
    public function testValidParam()
    {
        $this->withHeader('X-API-KEY', 'RIO')
        ->get('/middleware/param')
        ->assertStatus(200)
        ->assertSeeText('PARAM');
    }

    public function testUpload()
    {
        $picture = UploadedFile::fake()->image('kunti.jpg');

        $this->post('file/upload', [
            'picture' => $picture
        ])->assertSeeText("OK kunti.jpg");
    }
}

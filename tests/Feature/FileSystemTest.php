<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileSystemTest extends TestCase
{
    
    public function testStorage()
    {
        $fileSystem = Storage::disk('local');
        //disimpan di path storage/app/file.txt
        $fileSystem->put("file.txt", "mejikuhibinu");

        self::assertEquals("mejikuhibinu", $fileSystem->get("file.txt"));
    }

    public function testPublic()
    {
        $fileSystem = Storage::disk('public');
        //disimpan di path public/storage/file.txt
        $fileSystem->put("file.txt", "mejikuhibinu");

        self::assertEquals("mejikuhibinu", $fileSystem->get("file.txt"));
    }
}

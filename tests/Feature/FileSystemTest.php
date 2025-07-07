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
        $fileSystem->put("file.txt", "mejikuhibinu");

        self::assertEquals("mejikuhibinu", $fileSystem->get("file.txt"));
    }
}

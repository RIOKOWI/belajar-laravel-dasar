<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    
    public function testEncrypt()
    {
        $encrypt = Crypt::encrypt('Rio Ganteng');
        var_dump($encrypt);
        $decrypt = Crypt::decrypt($encrypt);

        self::assertEquals('Rio Ganteng', $decrypt);
    }
}

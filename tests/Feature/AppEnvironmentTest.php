<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppEnvironmentTest extends TestCase
{
    // cek ada di environment mana
    public function testAppEnv()
    {
        if(App::environment('local', 'prod', 'dev', 'testing'))
        {
            self::assertTrue(true);
        }
    }
}

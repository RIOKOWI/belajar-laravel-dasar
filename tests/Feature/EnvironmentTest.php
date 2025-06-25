<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Env;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $youtube = env('YOUTUBE');

        self::assertEquals('RIO ACHYAR', $youtube);
    }

    public function testGetEnvWithDefault()
    {
        $udin = Env::get('NAMA', 'jeneng');

        self::assertEquals("jeneng", $udin);
    }
}

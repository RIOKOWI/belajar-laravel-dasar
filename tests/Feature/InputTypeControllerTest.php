<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputTypeControllerTest extends TestCase
{
    public function testInputType()
    {
        $this->post('/input/type', [
            "name" => "rio",
            "boolean" => "true",
            "birt_date" => "2004-11-23"
        ])->assertSeeText("rio")->assertSeeText("true")->assertSeeText("2004-11-23");
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilterRequestInputControllerTest extends TestCase
{
    
    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            'name' => [
                'first' => 'rio',
                'middle' => 'rock', //dihiraukan
                'last' => 'achyar'
            ]
        ])->assertSeeText("rio")->assertSeeText("achyar")->assertDontSeeText("rock");
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            'username' => 'rioGanteng',
            'admin' => 'true', //dihiraukan
            'pass' => 'jawahytam',
        ])->assertSeeText("rioGanteng")->assertSeeText("jawahytam")->assertDontSeeText("true");
    }

    public function testMergeInput()
    {
        $this->post('/input/merge', [
            'username' => "kakangkung",
            'admin' => 'true' // ditimpa jadi false
        ])->assertSeeText("kakangkung")->assertSeeText("false");
    }

    public function testMergeIfMissingInput()
    {
        $this->post('/input/merge/missing', [
            'username' => "kakangkung",
            'admin' => 'true' // tidak di timpa
        ])->assertSeeText("kakangkung")->assertSeeText("true");
    }
}

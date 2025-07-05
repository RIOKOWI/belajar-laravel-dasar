<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{

    private HelloService $helloservice;

    public function __construct(HelloService $helloservice)
    {
        $this->helloservice = $helloservice;
    }

    public function hello(string $name): string
    {
        return $this->helloservice->hello($name);
    }

    public function halo(): string
    {
        return "Hello World";
    }

    
}

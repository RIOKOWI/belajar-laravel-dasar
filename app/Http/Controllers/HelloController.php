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

    //request
    // public function hello(Request $request, string $name): string
    // {
    //     $request->path(); ambil path 
    //     $request->url(); ambil url tanpa query parameter
    //     $request->fullUrl(); ambil url dengan query parameter
    //     $request->method(); ambil method
    //     $request->isMethod('post'); cek apakah request memiliki HTTP method sesuai parameter atau tidak 
    //     return $this->helloservice->hello($name);
    // }

    public function request(Request $request): string
    {
        return $request->path() . "<br>" .
                $request->url() . "<br>" .
                $request->fullUrl() . "<br>" .
                $request->method() . "<br>" .
                $request->header('accept') . "<br>";
    }
}

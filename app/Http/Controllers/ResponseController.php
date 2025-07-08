<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response("Hello response");
    }

    // HTTP Response Header
    public function header(Request $request): Response
    {
        $body = [
            'firstName' => 'Rio', 
            'lastName' => 'Achyar'
        ];
        
        return response(json_encode($body), 200)
        ->header('content-type', 'application/json')
        ->withHeaders([
            'Author' => 'Rio Achyar',
            'App' => 'Belajar Laravel'
        ]);
    }
}

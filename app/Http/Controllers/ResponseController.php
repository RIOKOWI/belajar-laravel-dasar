<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    //RESPONSE TYPE
    public function responseView(Request $request): Response
    {
        return response()->view('hello', ['name' => 'Rio Achyar']);
    }

    public function jsonResponse(Request $request): JsonResponse
    {
        $body = ['firstName' => 'Rio', 'lastName '=> 'Achyar'];
        return response()->json($body);
    }

    // RESPONSE FILE DAN DOWNLOAD
    public function responseFile(Request $request): BinaryFileResponse
    {
        return response()->file(storage_path('app/public/pictures/Rio.jpg'));
        // di render
    }

    public function responseDownload(Request $request): BinaryFileResponse
    {
        return response()->download(storage_path('app/public/pictures/1.jpg'));
        // dipaksa di download
    }
    
}


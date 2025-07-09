<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response
    {
        return response("Hello Cookie")
        ->cookie('User-Id', 'Rio Achyar', 1000, '/')
                                        // expired 1000 menit  '/' path nya
        ->cookie('Is-Member', true, 1000, '/');
    }

    // menerima cookie
    public function getCookie(Request $request): JsonResponse
    {
        return response()
        ->json([
            'userId' => $request->cookie('User-Id', 'guest'),
                                                    // kalau tidak ada = pakai guest
            'isMember' => $request->cookie('Is-Member', 'false')
                                                    // kalau tidak ada = pakai false
        ]);
    }
}

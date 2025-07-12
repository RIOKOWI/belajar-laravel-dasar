<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormCsrfController extends Controller
{
    public function form(): Response
    {
        return response()->view('csrf');
    }

    public function submitForm(Request $request): Response
    {
        $name = $request->input('name');
        return response()->view('hello', [ 'name' => $name]);
    }
}

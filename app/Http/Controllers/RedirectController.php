<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "Redirect To";
    }

    public function redirectFrom(): RedirectResponse
    {
        return redirect('/redirect/to');
    }

    // REDIRECT TO NAMED ROUTES
    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect-hello', ['name' => 'rio']);
    }

    public function redirectHello(string $name): string
    {
        return "hello " . $name;
    }
}

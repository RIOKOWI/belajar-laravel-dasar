<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return "Hello " . $name;
    }

    // NESTED INPUT
    public function firstName(Request $request): string
    {
        $firstName = $request->input('name.first');
        $lastName = $request->input('name.last');
        return "Hola " . $firstName . " " . $lastName;
    }

    // AMBIL SEMUA INPUT
    public function allInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    // mengambil input arrau
    public function helloArray(Request $request): string
    {
        $names = $request->input('products.*.name');
        $prices = $request->input('products.*.price');
        return json_encode([$names, $prices]);
    }

    // FILTER REQUEST INPUT
    public function filterOnly(Request $request): string
    {
        $name = $request->only(['name.first', 'name.last']);
        return json_encode($name);
    }

    public function filterExcept(Request $request): string
    {
        $user = $request->except('admin');
        return json_encode($user);
    }

    // MERGE INPUT
    public function mergeInput(Request $request): string
    {
        $request->merge(['admin' => false]);
        $user = $request->input();
        return json_encode($user);
    }

    public function mergeIfMissingInput(Request $request): string
    {
        $request->mergeIfMissing(['admin' => false]);
        $user = $request->input();
        return json_encode($user);
    }
}

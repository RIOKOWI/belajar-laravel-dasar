<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputTypeController extends Controller
{
    public function inputType(Request $request): string
    {
        $name = $request->input("name");// konversi ke string
        $married = $request->boolean("married");// konversi ke boolean
        $birthDate = $request->date('birth_date', 'Y-m-d');// konversi ke date

        return json_encode([
            "name" => $name,
            "married" => $married,
            "birth_date" => $birthDate->format('Y-m-d')
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;

class ErrorController extends Controller
{
    // ERROR REPORTER
    public function register()
    {
        $this->reportable(function (Throwable $e){
            var_dump($e);
            return false; //jika yang bawah tidak mau di eksekusi
        });
        $this->reportable(function (Throwable $e){
            var_dump($e);
        });
    }
}

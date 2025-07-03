<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rio', function(){
    return "Rio Ganteng Bgt";
});


// redirect jika akses /instagram akan ke /rio ('from','to')
Route::redirect('/instagram','/rio');


// follback route untuk mengubah tampilan error
Route::fallback(function(){
    return "404 DONGO LUWH";
});
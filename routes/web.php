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

            // url,   view,    ,variable {{ $name }}
Route::view('/hello', 'hello', ['name' => 'Rio Achyar']);

// atau pake ini juga bisa
Route::get('/hellocuk', function(){
    return view('hello', ['name' => 'Rio Achyar']);
});

//NESTED VIEW
            // url,   view,    ,variable {{ $name }}
Route::view('/world', 'hello.world', ['name' => 'Rio Achyar']);

// atau pake ini juga bisa
Route::get('/world1', function(){
    return view('hello.world', ['name' => 'Rio Achyar']);
});


// ROUTE PARAMETER
Route::get('/products/{id}', function($productId){
    return "Product : " . $productId;
});

Route::get('/products/{product}/items/{item}', function($productId, $itemId){
    return "Product : " . $productId . " Item ; " . $itemId;
});

//ROUTE REGULER EXPRESSION CONSTRAINT
Route::get('/categories/{id}', function(string $categoryId){
    return "Category : " . $categoryId;
    
})->where('id', '[0-9]+[a-z]+');
// parameternya harus ada angka dulu lalu huruf
// 'id', '[A-Za-z0-9_]+' lebih fleksibel
// regex boleh lebih dari 1

//OPTIONAL ROUTE PARAMETER
Route::get('users/{id}', function(string $userId = '404'){
    return "User : " . $userId;
});


//ROUTING CONFLICT

//yang di dijalankan yang ini
Route::get('conflicts/{id}', function($nama){
    return "Conflict " . $nama;
});

Route::get('conflicts/embud', function(){
    return "Conflict embud bud bud";
});




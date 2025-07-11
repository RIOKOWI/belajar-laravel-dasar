<?php

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\InputTypeController;

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



// NAMED ROUTE
Route::get('/products/{id}', function($productId){
    return "Product : " . $productId;
})->name('product.detail');

Route::get('/products/{product}/items/{item}', function($productId, $itemId){
    return "Product : " . $productId . " Item ; " . $itemId;
})->name('product.item.detail');

Route::get('/categories/{id}', function(string $categoryId){
    return "Category : " . $categoryId;    
})->where('id', '[0-9]+[a-z]+')->name('category.detail');

Route::get('users/{id}', function(string $userId = '404'){
    return "User : " . $userId;
})->name('user.detail');

Route::get('produk/{id}', function($id){
    $link = route('product.detail', ['id' => $id]);
    return "Link : " . $link;
});

Route::get('produk-redirect/{id}', function($id){
    return redirect()->route('product.detail', ['id' => $id]);
});


// ROUTE CONTROLLER
Route::get('/controller/halo', [HelloController::class, 'halo']);
//akses url                     // controller class     //function method

// REQUEST
Route::get('/controller/hello/request', [HelloController::class, 'request']);

Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

// INPUT REQUEST
Route::get('/input/hello/', [InputController::class, 'hello']);
Route::post('/input/hello/', [InputController::class, 'hello']);

// NESTED INPUT REQUEST
Route::post('/input/hola/', [InputController::class, 'firstName']);

// AMBIL SEMUA INPUT
Route::post('/input/hello/input', [InputController::class, 'allInput']);

// AMBIL SEMUA INPUT ARRAY
Route::post('/input/hello/array', [InputController::class, 'helloArray']);

//INPUT TYPE
Route::post('/input/type', [InputTypeController::class, 'inputType']);

// FILTER REQUEST INPUT
Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);

// MERGE INPUT 
Route::post('input/merge', [InputController::class, 'mergeInput']);
Route::post('input/merge/missing', [InputController::class, 'mergeIfMissingInput']);

// FILE UPLOAD
Route::post('upload/file', [FileController::class, 'upload']);

//RESPONSE
Route::get('/response', [ResponseController::class, 'response']);

// HTTP Response Header
Route::get('/response/header', [ResponseController::class, 'header']);

//RESPONSE TYPE
Route::get('/response/view', [ResponseController::class,'responseView']);
Route::get('/response/json', [ResponseController::class,'jsonResponse']);

//RESPONSE TYPE FILE DAN DOWNLOAD
Route::get('/response/file', [ResponseController::class,'responseFile']);
Route::get('/response/download', [ResponseController::class,'responseDownload']);


// COOKIE
// BUAT COOKIE
Route::get('/cookie/set', [CookieController::class, 'createCookie']);
// MENERIMA COOKIE
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
// CLEAR COOKIE
Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);

//REDIRECT
Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);
Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);

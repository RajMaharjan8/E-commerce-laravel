<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group (['middleware'=>'web'],function(){
    Route::get('/login', function(){
        return View('login');
    });
    
    Route::get('/logout', function(){
        Session::forget('user');
        return redirect('login');
    });
    
    
    
    Route::post('/login',[UserController::class, 'login']);
    Route::get('/',[ProductController::class, 'index']);
    Route::get('/detail/{id}',[ProductController::class,'detail']);
    Route::get('/search',[ProductController::class,'search']);
    
    Route::post('/add-to-cart',[ProductController::class,'add_to_cart']);
    
    Route::get('/cartdetail',[ProductController::class,'cartdetail']);
    
    Route::get('/removecart/{id}',[ProductController::class,'removeCart']);
    Route::post('/comment',[ProductController::class,'addComment']);
    Route::post('/register',[UserController::class, 'register']);
    Route::get('/register', function(){
        return view('register');
    });
    
    
});

// Routwe::get('/getcomment',[ProductController::class,'getComment']);




// Route::match(['get', 'post'], '/search', [ProductController::class,'search']);



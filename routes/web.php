<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'authors'], function(){
    Route::get('', [AuthorController::class, 'index'])->name('author.index');
    Route::get('create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::post('delete/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
 });

 Route::group(['prefix' => 'books'], function(){
    Route::get('', [BookController::class, 'index'])->name('book.index');
    Route::get('create', [BookController::class, 'create'])->name('book.create');
    Route::post('store', [BookController::class, 'store'])->name('book.store');
    Route::get('edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::post('delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('show/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('get-pdf/{book}', [BookController::class, 'pdf'])->name('book.pdf');
 }
);

<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserBookController;
use App\Http\Controllers\AuthorBookController;
use App\Http\Controllers\CategoryBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('users', UserController::class)->only('index', 'show');
Route::get('/authors', [AuthorController::class, 'index'])->name('users.index');
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('users.show');
Route::resource('categories', CategoryController::class)->only('index', 'show');
Route::resource('books', BookController::class)->only('index', 'show');

Route::resource('users.books', UserBookController::class)->only(['index']);
Route::resource('authors.books', AuthorBookController::class)->only(['index']);
Route::resource('category.books', CategoryBookController::class)->only(['index']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('books', BookController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

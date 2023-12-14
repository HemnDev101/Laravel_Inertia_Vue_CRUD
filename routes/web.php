<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/topics/' , [\App\Http\Controllers\TopicController::class , 'index'])->name('topics.index');
Route::get('/topics/create' , [\App\Http\Controllers\TopicController::class , 'create'])->name('topics.create');
Route::post('/topics' , [\App\Http\Controllers\TopicController::class , 'store'])->name('topics.store');
Route::get('/topics/{topic}/edit' , [\App\Http\Controllers\TopicController::class , 'edit'])->name('topics.edit');
Route::put('/topics/{topic}' , [\App\Http\Controllers\TopicController::class , 'update'])->name('topics.update');
Route::delete('/topics/{topic}' , [\App\Http\Controllers\TopicController::class , 'destroy'])->name('topics.destroy');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\PageController;
use App\Http\Controllers\Cms\ImageController;

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

Route::get('/', [PageController::class, 'home']);
Route::get('/search', [PageController::class, 'search']);
Route::post('/contact', [PageController::class, 'contact']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::prefix('cms')->group(function () {
        Route::get('/', function () {
            return view('cms.index');
        });
    });

    Route::resource('cms/pages', PageController::class);
    Route::resource('cms/images', ImageController::class);

});

require __DIR__.'/auth.php';

//Goes last
Route::get('{id}', [PageController::class, 'section']);
Route::get('{id}/{id2}', [PageController::class, 'show']);

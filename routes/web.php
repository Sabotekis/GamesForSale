<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GuestController;

// Route::redirect('/', '/videogames');
// Route::resource('videogames', CustomerController::class);

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->type == 'customer') {
            return redirect()->route('customer.index');
        } elseif (Auth::user()->type == 'company') {
            return redirect()->route('company.index');
        }
    }
    return view('guest');
})->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/guestsearch', [GuestController::class, 'search'])->name('guest.search');
Route::get('/videogames/{videogameId}', [GuestController::class, 'guestShow'])->name('guest.show');

Route::middleware('auth')->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/search', [CustomerController::class, 'search'])->name('customer.search');
        Route::post('/buy/{id}', [CustomerController::class, 'buy'])->name('customer.buy');
        Route::get('/videogame/{id}', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
        Route::get('/videogame/{id}/comment', [CustomerController::class, 'createComment'])->name('customer.create_comment');
        Route::post('/videogame/{id}/comment', [CustomerController::class, 'storeComment'])->name('customer.store_comment');
        Route::get('/comment/{id}/edit', [CustomerController::class, 'editComment'])->name('customer.edit_comment');
        Route::put('/comment/{id}', [CustomerController::class, 'updateComment'])->name('customer.update_comment');
        Route::delete('/comment/{id}', [CustomerController::class, 'destroyComment'])->name('customer.destroy_comment');
    });

    Route::prefix('company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/videogame/{id}', [CompanyController::class, 'show'])->name('company.show');
        Route::get('videogame/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::put('videogame/update/{id}', [CompanyController::class, 'update'])->name('company.update');
        Route::delete('videogame/destroy/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
        Route::get('/profile', [CompanyController::class, 'profileVideogames'])->name('company.profile');
        Route::get('/search', [CompanyController::class, 'search'])->name('company.search');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/block/{id}', [AdminController::class, 'block'])->name('admin.block');
        Route::delete('/destroy/videogame/{id}', [AdminController::class, 'destroyVideogame'])->name('admin.destroy_videogame');
        Route::delete('/destroy/comment/{id}', [AdminController::class, 'destroyComment'])->name('admin.destroy_comment');
        Route::get('/show_videogames', [AdminController::class, 'showVideogames'])->name('admin.show_videogames');
        Route::get('/show_comments', [AdminController::class, 'showComments'])->name('admin.show_comments');
    });
});



URL::forceScheme('https');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Account\EmailController;
use App\Http\Controllers\Account\NickNameController;
use App\Http\Controllers\Account\PasswordController;
use App\Http\Controllers\Account\WithDrawalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('account')->name('account.')->middleware(['auth'])->group(function () {
    Route::get('/', UserController::class)->name('show');
    Route::prefix('nickname')->name('nickname.')->controller(NickNameController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
    });
    Route::prefix('email')->name('email.')->controller(EmailController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
    });
    Route::prefix('password')->name('password.')->controller(PasswordController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
    });
    Route::prefix('withdrawal')->name('withdrawal.')->controller(WithDrawalController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::delete('/', 'destroy')->name('destroy');
    });
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    require __DIR__ . '/admin.php';
});

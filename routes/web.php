<?php

use App\Http\Controllers\AdminAspirationController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard')  ;


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        //ini dashboard admin
        Route::get('/dashboard', fn() => view('Admin.Dashboard'))->name('dashboard');
        //route category
        Route::resource('category', CategoryController::class);
        //route aspiration admin
        Route::get('/aspirations', [AdminAspirationController::class, 'index'])->name('aspirations.index');
        Route::get('/aspirations/{id}', [AdminAspirationController::class, 'show'])->name('aspirations.show');
        Route::put('/aspirations/{id}', [AdminAspirationController::class, 'update'])->name('aspirations.update');
        //route logout
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });

Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        //ini route dashboard siswa
        Route::get('/dashboard', fn() => view('Siswa.Dashboard'))->name('dashboard');
        //route student buat siswa
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
        Route::post('/student', [StudentController::class, 'store'])->name('student.store');
        Route::put('/student', [StudentController::class, 'update'])->name('student.update');
        //route aspiration
        Route::resource('/aspiration', AspirationController::class);
        //route logout
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

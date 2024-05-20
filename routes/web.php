<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('home.index');
    });

    
    Route::group(['middleware' => ['role:admin|writer|editor']], function () {
        Route::middleware('auth')->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->middleware(['verified'])->name('dashboard');
    
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::resource('/products', ProductController::class);
        });
        
             Route::resource('/roles',RoleController::class);
             Route::resource('/permissions',PermissionController::class);
             Route::resource('/users',UserController::class);
    });
    // Route::resource('/roles',RoleController::class);
    // Route::resource('/permissions',PermissionController::class);
    // Route::resource('/users',UserController::class);

    require __DIR__.'/auth.php';
});

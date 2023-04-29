
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacebookController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\GoogleAuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    return view('landingpage');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google',[GoogleAuthController::class ,'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class , 'callbackGoogle']);

Route::get('auth/facebook',[FacebookController::class ,'redirect'])->name('facebook-auth');
Route::get('auth/faceook/callback', [FacebookController::class , 'callbackFacebook']);


Route::get('add-user', [UserController::class , 'addUser']);
Route::post('saved-user', [UserController::class , 'savedUser']);
Route::get('edit-user/{id}', [UserController::class , 'editUser']);
Route::post('edit-user', [UserController::class , 'updateUser']);
Route::get('delete-user/{id}', [UserController::class , 'deleteUser']);
require __DIR__.'/auth.php';

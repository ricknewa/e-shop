<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GithubProvider;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\profile\AvatarController;
use App\Models\product;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [ProductController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cart', [ProductController::class, 'cart'])->middleware(['auth', 'verified'])->name('cart');

Route::get('/about', function () {
  return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::post('/auth/redirect', function () {
  return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/callback', function () {
  $user = Socialite::driver('github')->stateless()->user();
  $user = User::firstOrCreate(['email' => $user->email], [
    'name' => $user->name,
    'password' => 'password'
  ]);
  Auth::login($user);
  return redirect('/');
});
Route::middleware('auth')->group(function () {
  Route::resource('product', ProductController::class);
});
Route::get('/cart', [ProductController::class, 'cart'])->middleware(['auth', 'verified'])->name('cart');

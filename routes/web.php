<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutfitController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CaptchaServiceController;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Auth::routes();

//verifikasi email user
Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('role:admin')->get('/dashboard', [BerandaController::class, 'index'])->name('dashboard');
Route::get('/home', [BerandaController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('outfits', OutfitController::class);
    Route::resource('beranda', BerandaController::class);
    Route::get('shop', [BuyController::class, 'index'])->name('shop.index');
    Route::get('/outfitPdf', [OutfitController::class, 'cetak_pdf'])->name('cetak_pdf');
    Route::get('/export_excel', [OutfitController::class, 'export_excel'])->name('export_excel');
    Route::post('search', '\App\Http\Controllers\HomeController@search');
    Route::get('shop/buy', [BuyController::class, 'pembayaran'])->name('shop.buy');
});
Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'captchaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

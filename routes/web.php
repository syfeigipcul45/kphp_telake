<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\DataController;
use App\Http\Controllers\Dashboard\SettingController;

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

// auth section
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');

// homepage section
Route::get('/', [HomeController::class, 'index'])->name('homepage.index');
Route::get('/news', [HomeController::class, 'news'])->name('homepage.news');
Route::group(['prefix'=>'profile'], function() {
    Route::get('kaltim-forest', [HomeController::class, 'kaltim'])->name('homepage.kaltim');
    Route::get('vision-mission', [HomeController::class, 'vision'])->name('homepage.vision');
    Route::get('organization-structure', [HomeController::class, 'structure'])->name('homepage.structure');
});
Route::get('/forestry-data', [HomeController::class, 'forestryData'])->name('homepage.forestry');
Route::get('/contact', [HomeController::class, 'contact'])->name('homepage.contact');

// dashboard section
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main.index');
    
    Route::get('/management-news', [NewsController::class, 'index'])->name('dashboard.news.index');
    Route::get('/management-news/create', [NewsController::class, 'create'])->name('dashboard.news.create');
    
    Route::get('/management-datas', [DataController::class, 'index'])->name('dashboard.datas.index');
    
    Route::get('/settings', [SettingController::class, 'index'])->name('dashboard.settings.index');
});

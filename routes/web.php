<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\SeedController;
use App\Http\Controllers\Dashboard\PhotoController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Dashboard\DataController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\PageController;

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
Route::group(['prefix'=>'media'], function() {
    Route::get('photo', [HomeController::class, 'mediaPhoto'])->name('homepage.media.photo');
    Route::get('video', [HomeController::class, 'mediaVideo'])->name('homepage.media.video');
});
Route::get('/forestry-data', [HomeController::class, 'forestryData'])->name('homepage.forestry');
Route::get('/seed-search', [HomeController::class, 'seedSearch'])->name('homepage.seed.search');
Route::get('/contact', [HomeController::class, 'contact'])->name('homepage.contact');

// dashboard section
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main.index');
    
    Route::get('/management-news', [NewsController::class, 'index'])->name('dashboard.news.index');
    Route::get('/management-news/create', [NewsController::class, 'create'])->name('dashboard.news.create');
    Route::post('/management-news', [NewsController::class, 'store'])->name('dashboard.news.store');

    Route::get('/management-seeds', [SeedController::class, 'index'])->name('dashboard.seeds.index');
    Route::get('/management-seeds/create', [SeedController::class, 'create'])->name('dashboard.seeds.create');
    Route::post('/management-seeds', [SeedController::class, 'store'])->name('dashboard.seeds.store');
    
    // Route::get('/management-videos', [VideoController::class, 'index'])->name('dashboard.videos.index');
    // Route::post('/management-videos', [VideoController::class, 'store'])->name('dashboard.videos.store');
    
    Route::get('/media/management-photos', [PhotoController::class, 'index'])->name('dashboard.photos.index');
    Route::get('/media/management-photos/create', [PhotoController::class, 'create'])->name('dashboard.photos.create');
    
    Route::get('/media/management-videos', [VideoController::class, 'index'])->name('dashboard.videos.index');

    Route::get('/management-datas', [DataController::class, 'index'])->name('dashboard.datas.index');
  
    Route::get('/profile-kaltim-forest', [PageController::class, 'create'])->name('dashboard.page.kaltimforest');
    Route::get('/profile-vision-mission', [PageController::class, 'create'])->name('dashboard.page.visionmission');
    Route::get('/profile-structure-organization', [PageController::class, 'create'])->name('dashboard.page.structure');

    Route::get('/sector-secretary', [PageController::class, 'create'])->name('dashboard.page.secretary');
    Route::get('/sector-plan', [PageController::class, 'create'])->name('dashboard.page.plan');
    Route::get('/sector-protection', [PageController::class, 'create'])->name('dashboard.page.protection');
    Route::get('/sector-management', [PageController::class, 'create'])->name('dashboard.page.management');
    Route::get('/sector-counseling', [PageController::class, 'create'])->name('dashboard.page.counseling');
    
    Route::get('/settings', [SettingController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('dashboard.settings.store');
});

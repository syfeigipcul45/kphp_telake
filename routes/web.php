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
use App\Http\Controllers\Dashboard\HeroController;
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
Route::get('/news/{slug}', [HomeController::class, 'newsDetail'])->name('homepage.news.detail');
Route::get('/profile/{slug}', [HomeController::class, 'profile'])->name('homepage.profile');
Route::get('/dept/{slug}', [HomeController::class, 'dept'])->name('homepage.dept');
Route::get('/area/{slug}', [HomeController::class, 'area'])->name('homepage.area');
Route::get('/event/{slug}', [HomeController::class, 'event'])->name('homepage.event');
Route::group(['prefix'=>'media'], function() {
    Route::get('photo', [HomeController::class, 'mediaPhoto'])->name('homepage.media.photo');
    Route::get('video', [HomeController::class, 'mediaVideo'])->name('homepage.media.video');
});
Route::get('/forestry-data', [HomeController::class, 'forestryData'])->name('homepage.forestry');
Route::get('/forestry-data/pencarian', [HomeController::class, 'searchByCategory'])->name('homepage.forestry.search');
Route::get('/seed-search', [HomeController::class, 'seedSearch'])->name('homepage.seed.search');
Route::get('/contact', [HomeController::class, 'contact'])->name('homepage.contact');

// dashboard section
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main.index');
    
    Route::get('/management-news', [NewsController::class, 'index'])->name('dashboard.news.index');
    Route::get('/management-news/create', [NewsController::class, 'create'])->name('dashboard.news.create');
    Route::post('/management-news', [NewsController::class, 'store'])->name('dashboard.news.store');
    Route::get('/management-news/{id}/edit', [NewsController::class, 'edit'])->name('dashboard.news.edit');
    Route::post('/management-news/{id}/update', [NewsController::class, 'update'])->name('dashboard.news.update');
    Route::post('/management-news/{id}', [NewsController::class, 'destroy'])->name('dashboard.news.destroy');

    Route::get('/management-seeds', [SeedController::class, 'index'])->name('dashboard.seeds.index');
    Route::get('/management-seeds/create', [SeedController::class, 'create'])->name('dashboard.seeds.create');
    Route::post('/management-seeds', [SeedController::class, 'store'])->name('dashboard.seeds.store');
    Route::get('/management-seeds/{id}/edit', [SeedController::class, 'edit'])->name('dashboard.seeds.edit');
    Route::post('/management-seeds/{id}/update', [SeedController::class, 'update'])->name('dashboard.seeds.update');
    Route::post('/management-seeds/{id}', [SeedController::class, 'destroy'])->name('dashboard.seeds.destroy');
    
    Route::get('/media/management-photos', [PhotoController::class, 'index'])->name('dashboard.photos.index');
    Route::get('/media/management-photos/create', [PhotoController::class, 'create'])->name('dashboard.photos.create');
    Route::post('/media/management-photos/store', [PhotoController::class, 'store'])->name('dashboard.photos.store');
    Route::get('/media/management-photos/{id}/edit', [PhotoController::class, 'edit'])->name('dashboard.photos.edit');
    Route::post('/media/management-photos/{id}/update', [PhotoController::class, 'update'])->name('dashboard.photos.update');
    Route::post('/media/management-photos/{id}', [PhotoController::class, 'destroy'])->name('dashboard.photos.destroy');
    
    Route::get('/media/management-videos', [VideoController::class, 'index'])->name('dashboard.videos.index');
    Route::get('/media/management-videos/create', [VideoController::class, 'create'])->name('dashboard.videos.create');
    Route::post('/media/management-videos/store', [VideoController::class, 'store'])->name('dashboard.videos.store');

    Route::get('/management-datas', [DataController::class, 'index'])->name('dashboard.datas.index');
    Route::get('/management-datas/create', [DataController::class, 'create'])->name('dashboard.datas.create');
    Route::post('/management-datas/store', [DataController::class, 'store'])->name('dashboard.datas.store');
    Route::get('/management-datas/{id}/edit', [DataController::class, 'edit'])->name('dashboard.datas.edit');
    Route::post('/management-datas/{id}/update', [DataController::class, 'update'])->name('dashboard.datas.update');
    Route::post('/management-datas/{id}', [DataController::class, 'destroy'])->name('dashboard.datas.destroy');
  
    Route::get('pages/profiles', [PageController::class, 'profileIndex'])->name('dashboard.page.profiles.index');
    Route::get('pages/profiles/create', [PageController::class, 'profileCreate'])->name('dashboard.page.profiles.create');
    Route::post('pages/profiles', [PageController::class, 'profileStore'])->name('dashboard.page.profiles.store');

    Route::get('pages/depts', [PageController::class, 'deptIndex'])->name('dashboard.page.depts.index');
    Route::get('pages/depts/create', [PageController::class, 'deptCreate'])->name('dashboard.page.depts.create');
    Route::post('pages/depts', [PageController::class, 'deptStore'])->name('dashboard.page.depts.store');

    Route::get('pages/areas', [PageController::class, 'areaIndex'])->name('dashboard.page.areas.index');
    Route::get('pages/areas/create', [PageController::class, 'areaCreate'])->name('dashboard.page.areas.create');
    Route::post('pages/areas', [PageController::class, 'areaStore'])->name('dashboard.page.areas.store');

    Route::get('pages/events', [PageController::class, 'eventIndex'])->name('dashboard.page.events.index');
    Route::get('pages/events/create', [PageController::class, 'eventCreate'])->name('dashboard.page.events.create');
    Route::post('pages/events', [PageController::class, 'eventStore'])->name('dashboard.page.events.store');
    
    Route::get('/hero-images', [HeroController::class, 'index'])->name('dashboard.hero.images.index');
    Route::get('/hero-images/create', [HeroController::class, 'create'])->name('dashboard.hero.images.create');
    Route::post('/hero-images', [HeroController::class, 'store'])->name('dashboard.hero.images.store');
    Route::post('/hero-images/{id}', [HeroController::class, 'destroy'])->name('dashboard.hero.images.destroy');
    
    Route::get('/settings', [SettingController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('dashboard.settings.store');
    
    Route::get('/section-profile', [SettingController::class, 'profile'])->name('dashboard.settings.profile');
    Route::post('/section-profile', [SettingController::class, 'updateProfile'])->name('dashboard.settings.profile.update');
});

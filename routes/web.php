<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\CommentsProduct;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\ProductCategoryController;
use App\Http\Controllers\Dashboard\SeedController;
use App\Http\Controllers\Dashboard\PhotoController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Dashboard\DataController;
use App\Http\Controllers\Dashboard\DocumentCategoryController;
use App\Http\Controllers\Dashboard\HeroController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\UserController;

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
Route::post('/forgot-password', [AuthController::class, 'sendMail'])->name('forgot.password.sendmail');
Route::get('/logout', [AuthController::class, 'doLogout'])->name('do.logout');

// homepage section
Route::get('/', [HomeController::class, 'index'])->name('homepage.index');
Route::get('/news', [HomeController::class, 'news'])->name('homepage.news');
Route::get('/news/{slug}', [HomeController::class, 'newsDetail'])->name('homepage.news.detail');
Route::get('/profile/{slug}', [HomeController::class, 'profile'])->name('homepage.profile');
Route::get('/dept/{slug}', [HomeController::class, 'dept'])->name('homepage.dept');
Route::get('/rph/{slug}', [HomeController::class, 'rph'])->name('homepage.rph');
Route::get('/event/{slug}', [HomeController::class, 'event'])->name('homepage.event');
Route::group(['prefix'=>'media'], function() {
    Route::get('photo', [HomeController::class, 'mediaPhoto'])->name('homepage.media.photo');
    Route::get('video', [HomeController::class, 'mediaVideo'])->name('homepage.media.video');
});
Route::get('/forestry-data', [HomeController::class, 'forestryData'])->name('homepage.forestry');
Route::get('/forestry-data/pencarian', [HomeController::class, 'searchByCategory'])->name('homepage.forestry.search');
Route::get('/product-search', [HomeController::class, 'seedSearch'])->name('homepage.seed.search');
Route::get('/product-search/{id}', [HomeController::class, 'productDetail'])->name('homepage.products.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('homepage.contact');
Route::post('/contact/store', [HomeController::class, 'contactStore'])->name('homepage.contact.store');
Route::post('/comment/store', [HomeController::class, 'commentStore'])->name('homepage.comment.store');

// dashboard section
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.main.index');
    
    Route::get('/management-users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/management-users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/management-users', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/management-users/{id}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('/management-users/{id}/update', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::post('/management-users/{id}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');

    Route::get('/management-contact',[ContactController::class, 'index'])->name('dashboard.contacts.index');
    Route::get('/management-contact/{id}/show',[ContactController::class, 'show'])->name('dashboard.contacts.show');
    
    Route::get('/management-news', [NewsController::class, 'index'])->name('dashboard.news.index');
    Route::get('/management-news/create', [NewsController::class, 'create'])->name('dashboard.news.create');
    Route::post('/management-news', [NewsController::class, 'store'])->name('dashboard.news.store');
    Route::get('/management-news/{id}/edit', [NewsController::class, 'edit'])->name('dashboard.news.edit');
    Route::post('/management-news/{id}/update', [NewsController::class, 'update'])->name('dashboard.news.update');
    Route::post('/management-news/{id}', [NewsController::class, 'destroy'])->name('dashboard.news.destroy');

    Route::get('/management-document-categories', [DocumentCategoryController::class, 'index'])->name('dashboard.document.categories.index');
    Route::get('/management-document-categories/create', [DocumentCategoryController::class, 'create'])->name('dashboard.document.categories.create');
    Route::post('/management-document-categories', [DocumentCategoryController::class, 'store'])->name('dashboard.document.categories.store');
    Route::get('/management-document-categories/{id}/edit', [DocumentCategoryController::class, 'edit'])->name('dashboard.document.categories.edit');
    Route::post('/management-document-categories/{id}/update', [DocumentCategoryController::class, 'update'])->name('dashboard.document.categories.update');
    Route::post('/management-document-categories/{id}', [DocumentCategoryController::class, 'destroy'])->name('dashboard.document.categories.destroy');

    Route::get('/management-seeds', [SeedController::class, 'index'])->name('dashboard.seeds.index');
    Route::get('/management-seeds/create', [SeedController::class, 'create'])->name('dashboard.seeds.create');
    Route::post('/management-seeds', [SeedController::class, 'store'])->name('dashboard.seeds.store');
    Route::get('/management-seeds/{id}/edit', [SeedController::class, 'edit'])->name('dashboard.seeds.edit');
    Route::get('/management-seeds/{id}/show', [SeedController::class, 'show'])->name('dashboard.seeds.show');
    Route::post('/management-seeds/{id}/update', [SeedController::class, 'update'])->name('dashboard.seeds.update');
    Route::post('/management-seeds/{id}', [SeedController::class, 'destroy'])->name('dashboard.seeds.destroy');
    Route::post('/management-show-comment/{id}/update', [SeedController::class, 'showComment'])->name('dashboard.comment.show');
    Route::post('/management-hide-comment/{id}/update', [SeedController::class, 'hideComment'])->name('dashboard.comment.hide');
    
    Route::get('/media/management-photos', [PhotoController::class, 'index'])->name('dashboard.photos.index');
    Route::get('/media/management-photos/create', [PhotoController::class, 'create'])->name('dashboard.photos.create');
    Route::post('/media/management-photos/store', [PhotoController::class, 'store'])->name('dashboard.photos.store');
    Route::get('/media/management-photos/{id}/edit', [PhotoController::class, 'edit'])->name('dashboard.photos.edit');
    Route::post('/media/management-photos/{id}/update', [PhotoController::class, 'update'])->name('dashboard.photos.update');
    Route::post('/media/management-photos/{id}', [PhotoController::class, 'destroy'])->name('dashboard.photos.destroy');
    
    Route::get('/media/management-videos', [VideoController::class, 'index'])->name('dashboard.videos.index');
    Route::get('/media/management-videos/create', [VideoController::class, 'create'])->name('dashboard.videos.create');
    Route::post('/media/management-videos/store', [VideoController::class, 'store'])->name('dashboard.videos.store');
    Route::get('/media/management-videos/{id}/edit', [VideoController::class, 'edit'])->name('dashboard.videos.edit');
    Route::post('/media/management-videos/{id}/update', [VideoController::class, 'update'])->name('dashboard.videos.update');
    Route::post('/media/management-videos/{id}', [VideoController::class, 'destroy'])->name('dashboard.videos.destroy');

    Route::get('/management-datas', [DataController::class, 'index'])->name('dashboard.datas.index');
    Route::get('/management-datas/create', [DataController::class, 'create'])->name('dashboard.datas.create');
    Route::post('/management-datas/store', [DataController::class, 'store'])->name('dashboard.datas.store');
    Route::get('/management-datas/{id}/edit', [DataController::class, 'edit'])->name('dashboard.datas.edit');
    Route::post('/management-datas/{id}/update', [DataController::class, 'update'])->name('dashboard.datas.update');
    Route::post('/management-datas/{id}', [DataController::class, 'destroy'])->name('dashboard.datas.destroy');
  
    Route::get('pages/profiles', [PageController::class, 'profileIndex'])->name('dashboard.page.profiles.index');
    Route::get('pages/profiles/create', [PageController::class, 'profileCreate'])->name('dashboard.page.profiles.create');
    Route::post('pages/profiles', [PageController::class, 'profileStore'])->name('dashboard.page.profiles.store');
    Route::get('pages/profiles/{id}/edit', [PageController::class, 'profileEdit'])->name('dashboard.page.profiles.edit');
    Route::post('pages/profiles/{id}/update', [PageController::class, 'profileUpdate'])->name('dashboard.page.profiles.update');
    Route::post('pages/profiles/{id}', [PageController::class, 'profileDestroy'])->name('dashboard.page.profiles.destroy');

    Route::get('pages/depts', [PageController::class, 'deptIndex'])->name('dashboard.page.depts.index');
    Route::get('pages/depts/create', [PageController::class, 'deptCreate'])->name('dashboard.page.depts.create');
    Route::post('pages/depts', [PageController::class, 'deptStore'])->name('dashboard.page.depts.store');
    Route::get('pages/depts/{id}/edit', [PageController::class, 'deptEdit'])->name('dashboard.page.depts.edit');
    Route::post('pages/depts/{id}/update', [PageController::class, 'deptUpdate'])->name('dashboard.page.depts.update');
    Route::post('pages/depts/{id}', [PageController::class, 'deptDestroy'])->name('dashboard.page.depts.destroy');

    Route::get('pages/rph', [PageController::class, 'rphIndex'])->name('dashboard.page.rph.index');
    Route::get('pages/rph/create', [PageController::class, 'rphCreate'])->name('dashboard.page.rph.create');
    Route::post('pages/rph', [PageController::class, 'rphStore'])->name('dashboard.page.rph.store');
    Route::get('pages/rph/{id}/edit', [PageController::class, 'rphEdit'])->name('dashboard.page.rph.edit');
    Route::post('pages/rph/{id}/update', [PageController::class, 'rphUpdate'])->name('dashboard.page.rph.update');
    Route::post('pages/rph/{id}', [PageController::class, 'rphDestroy'])->name('dashboard.page.rph.destroy');

    Route::get('pages/events', [PageController::class, 'eventIndex'])->name('dashboard.page.events.index');
    Route::get('pages/events/create', [PageController::class, 'eventCreate'])->name('dashboard.page.events.create');
    Route::post('pages/events', [PageController::class, 'eventStore'])->name('dashboard.page.events.store');
    Route::get('pages/events/{id}/edit', [PageController::class, 'eventEdit'])->name('dashboard.page.events.edit');
    Route::post('pages/events/{id}/update', [PageController::class, 'eventUpdate'])->name('dashboard.page.events.update');
    Route::post('pages/events/{id}', [PageController::class, 'eventDestroy'])->name('dashboard.page.events.destroy');
    
    Route::get('/hero-images', [HeroController::class, 'index'])->name('dashboard.hero.images.index');
    Route::get('/hero-images/create', [HeroController::class, 'create'])->name('dashboard.hero.images.create');
    Route::post('/hero-images', [HeroController::class, 'store'])->name('dashboard.hero.images.store');
    Route::get('/hero-images/{id}/edit', [HeroController::class, 'edit'])->name('dashboard.hero.images.edit');
    Route::post('/hero-images/{id}/update', [HeroController::class, 'update'])->name('dashboard.hero.images.update');
    Route::post('/hero-images/{id}', [HeroController::class, 'destroy'])->name('dashboard.hero.images.destroy');
    
    Route::get('/settings', [SettingController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('dashboard.settings.store');
    
    Route::get('/section-profile', [SettingController::class, 'profile'])->name('dashboard.settings.profile');
    Route::post('/section-profile', [SettingController::class, 'updateProfile'])->name('dashboard.settings.profile.update');

    Route::post('/sub-menus/{id}/increase', [PageController::class, 'increase'])->name('dashboard.order.increase');
    Route::post('/sub-menus/{id}/decrease', [PageController::class, 'decrease'])->name('dashboard.order.decrease');
});

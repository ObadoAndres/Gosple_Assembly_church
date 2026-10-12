<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SermonController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MinistryController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\SermonController as PublicSermonController;
use App\Http\Controllers\Public\EventController as PublicEventController;
use App\Http\Controllers\Public\MinistryController as PublicMinistryController;
use App\Http\Controllers\Public\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Public pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/vision-mission', [PageController::class, 'visionMission'])->name('vision-mission');
Route::get('/leadership', [PageController::class, 'leadership'])->name('leadership');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/giving', [PageController::class, 'giving'])->name('giving');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Public sermons
Route::get('/sermons', [PublicSermonController::class, 'index'])->name('sermons.index');
Route::get('/sermons/{slug}', [PublicSermonController::class, 'show'])->name('sermons.show');

// Public events
Route::get('/events', [PublicEventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [PublicEventController::class, 'show'])->name('events.show');

// Public ministries
Route::get('/ministries', [PublicMinistryController::class, 'index'])->name('ministries.index');
Route::get('/ministries/{slug}', [PublicMinistryController::class, 'show'])->name('ministries.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->as('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sermons', SermonController::class);
    Route::post('/sermons/{sermon}/publish', [SermonController::class, 'publish'])->name('sermons.publish');
    Route::post('/sermons/{sermon}/unpublish', [SermonController::class, 'unpublish'])->name('sermons.unpublish');
    Route::resource('events', EventController::class);
    Route::post('/events/{event}/publish', [EventController::class, 'publish'])->name('events.publish');
    Route::post('/events/{event}/unpublish', [EventController::class, 'unpublish'])->name('events.unpublish');
    Route::resource('ministries', MinistryController::class);
    Route::post('/ministries/{ministry}/activate', [MinistryController::class, 'activate'])->name('ministries.activate');
    Route::post('/ministries/{ministry}/deactivate', [MinistryController::class, 'deactivate'])->name('ministries.deactivate');
    Route::resource('announcements', AnnouncementController::class);
    Route::post('/announcements/{announcement}/publish', [AnnouncementController::class, 'publish'])->name('announcements.publish');
    Route::post('/announcements/{announcement}/unpublish', [AnnouncementController::class, 'unpublish'])->name('announcements.unpublish');
});

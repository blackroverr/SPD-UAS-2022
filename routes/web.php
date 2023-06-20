<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\FilemanagerController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

//landing page
Route::get('/', [PageController::class, 'landingPage'])->name('index');

//login
Route::controller(AuthController::class)->middleware('guest')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'authenticating');
});

//routes for super admin
Route::middleware('auth')->group(function() {
        // Route::get('users-page', 'usersLayout1', [UserController::class, 'index'])->name('users-layout-1')->middleware('must-superadmin');
        Route::get('/users-page', [UserController::class, 'index'])->name('users-layout-1')->middleware('must-superadmin');
        Route::get('/add-new-users',[UserController::class, 'create'])->middleware('must-superadmin');
        Route::post('/add-user',[UserController::class, 'store'])->middleware('must-superadmin');
        Route::get('/edit-users/{id}',[UserController::class, 'edit'])->middleware('must-superadmin');
        Route::put('/edit-users/{id}',[UserController::class, 'update'])->middleware('must-superadmin');
        Route::delete('/delete-users/{id}',[UserController::class, 'destroy'])->middleware('must-superadmin');      
});

//routes profile
Route::middleware('auth')->group(function() {
        Route::get('/profile-page',[ProfileController::class, 'index' ])->name('profile-overview-2');
        Route::put('/profile-page', [ProfileController::class, 'update' ])->name('profile.update');
        Route::put('/profile-password', [ProfileController::class, 'updatePassword' ])->name('password.update');
});

//upload file-upload-page
Route::middleware('auth')->group(function() {
    
    Route::get('/file-upload-page',[FilemanagerController::class, 'index' ])->name('file-upload');
    Route::post('/unggah', [FilemanagerController::class, 'store' ])->name('upload.store');
    
    //upload file-manager-page 
    // Route::get('/file-manager',[PageController::class, 'fileManager', FilemanagerController::class, 'index'])->name('file-manager');
    Route::get('/file-manager-page',[FileController::class, 'index'])->name('file-manager');
    Route::post('/submit', [FileController::class, 'store'])->name('submitFile');
    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
    Route::delete('/hapus', [UploadController::class, 'destroy'])->name('hapus');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        Route::get('/dashboard-page', 'dashboardOverview1')->name('dashboard-view');
        // Route::get('/file-manager-page', 'fileManager', [FileController::class, 'index' ])->name('file-manager');
        // Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        // Route::get('crud-form-page', 'crudForm')->name('crud-form');

        // Route::get('regular-table-page', 'regularTable')->name('regular-table');
        // Route::get('tabulator-page', 'tabulator')->name('tabulator');
        // Route::get('modal-page', 'modal')->name('modal');
        // Route::get('slide-over-page', 'slideOver')->name('slide-over');
        // Route::get('notification-page', 'notification')->name('notification');
        // Route::get('tab-page', 'tab')->name('tab');
        // Route::get('accordion-page', 'accordion')->name('accordion');
        // Route::get('button-page', 'button')->name('button');
        // Route::get('alert-page', 'alert')->name('alert');
        // Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        // Route::get('tooltip-page', 'tooltip')->name('tooltip');
        // Route::get('dropdown-page', 'dropdown')->name('dropdown');
        // Route::get('typography-page', 'typography')->name('typography');
        // Route::get('icon-page', 'icon')->name('icon');
        // Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        // Route::get('regular-form-page', 'regularForm')->name('regular-form');
        // Route::get('datepicker-page', 'datepicker')->name('datepicker');
        // Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        // Route::get('slider-page', 'slider')->name('slider');
        // Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    });
});

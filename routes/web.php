<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintController;
use App\http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;

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
    return view('users.beranda');
})->name('beranda');

Auth::routes();

Route::middleware(['auth'])->group(function() {

    Route::middleware(['admin'])->group(function(){
        
    });

    Route::middleware(['user'])->group(function () {
        Route::get('profil', [ProfileController::class, 'index']);
    });

});




Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('agency', AgencyController::class);
Route::resource('category', CategoryController::class);
Route::resource('region', RegionController::class);
Route::resource('complaint', ComplaintController::class);
Route::resource('users', UserController::class);
Route::resource('administrator', AdminController::class);
Route::resource('leader', PimpinanController::class);
Route::resource('officer', PetugasController::class);
Route::resource('profile', ProfileController::class);
Route::resource('public', PublicController::class);
Route::resource('comment', CommentController::class);

Route::get('list', [ComplaintController::class, 'list'])->name('complaint.list');
Route::get('administrator', [AdminController::class, 'administrator'])->name('admin.administrator');
Route::get('complaintindex', [AdminController::class, 'complaintindex'])->name('admin.complaint');
Route::get('leader', [PimpinanController::class, 'leader'])->name('admin.leader');
Route::get('officer', [PetugasController::class, 'officer'])->name('admin.officer');
Route::get('people', [UserController::class, 'people'])->name('admin.people');

Route::get('/app', function() {
    return view('layouts.app');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function() {
    return view('users.profile.sidenav');
});

Route::get('/test2', function() {
    return view('users.profile.test');
});

Route::get('/showlist', function() {
    return view('users.showlist');
});

Route::get('/testcomment', function() {
    return view('users.comments');
});



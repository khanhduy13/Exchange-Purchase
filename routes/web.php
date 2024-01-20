<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\PostADcontroller;
use Dompdf\Dompdf;

Route::get('/export-pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');
Route::get('/export-pdf1', [ExportController::class, 'exportPDF1'])->name('export.pdf1');
Route::get('/export-pdf2', [ExportController::class, 'exportPDF2'])->name('export.pdf2');
Route::get('/export-pdf3', [ExportController::class, 'exportPDF3'])->name('export.pdf3');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login_action', [AuthController::class, 'login_action']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register_action', [AuthController::class, 'register_action']);
Route::get('forgotpw', [AuthController::class, 'forgotpw'])->name('forgotpw');
Route::post('forgotpw_action', [AuthController::class, 'forgotpw_action']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::post('upload/services', [UploadController::class, 'store']);
Route::middleware(['auth'])->group(function () {

  Route::prefix('admin')->group(function () {

    Route::get('/', [Controller::class, 'index'])->name('admin');
    Route::get('main', [Controller::class, 'index']);

    Route::prefix('accs')->group(function () {
      Route::get('add', [AccController::class, 'create']);
      Route::post('add', [AccController::class, 'store']);
      Route::get('list', [AccController::class, 'index']);
      Route::get('listAdmin', [AccController::class, 'index2']);
      Route::get('revenue', [AccController::class, 'revenue']);
      Route::get('success', [AccController::class, 'success']);
      Route::get('edit/{acc}', [AccController::class, 'show']);
      Route::post('edit/{acc}', [AccController::class, 'update']);
      Route::DELETE('destroy', [AccController::class, 'destroy']);
    });

    Route::prefix('menus')->group(function () {
      Route::get('add', [MenuController::class, 'create']);
      Route::post('add', [MenuController::class, 'store']);
      Route::get('list', [MenuController::class, 'index']);
      Route::get('edit/{menu}', [MenuController::class, 'show']);
      Route::post('edit/{menu}', [MenuController::class, 'update']);
      Route::DELETE('destroy', [MenuController::class, 'destroy']);
    });
    Route::prefix('posts')->group(function () {
      Route::get('daduyet', [PostADcontroller::class, 'index']);
      Route::get('chuaduyet', [PostADcontroller::class, 'index2']);
      Route::get('bikhoa', [PostADcontroller::class, 'index3']);
      Route::get('phithu', [PostADcontroller::class, 'phithu']);
      Route::get('totalformenu', [PostADcontroller::class, 'totalformenu']);
      Route::get('edit/{post}', [PostADcontroller::class, 'show']);
      Route::post('edit/{post}', [PostADcontroller::class, 'update']);
    });
  });
  Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {

      Route::get('/newfeed', [UserController::class, 'show']);
      Route::get('/profile', [UserController::class, 'index']);
      Route::get('/resetpassword/{user}', [UserController::class, 'resetpw']);
      Route::post('/resetpassword/{user}', [UserController::class, 'resetpw_action']);
      Route::get('/editprofile', [UserController::class, 'editprofile']);
      Route::post('/editprofile', [UserController::class, 'store']);
      Route::get('/post', [PostController::class, 'crpost']);
      Route::post('/post', [PostController::class, 'store']);
      Route::get('/listpost', [PostController::class, 'list']);
      Route::get('/detailpost/{post}', [PostController::class, 'detail']);
      Route::get('/buypost/{post}', [PostController::class, 'buy']);
      Route::post('/buypost/{post}', [PostController::class, 'postbuy']);
      Route::get('/exchangepost/{post}', [PostController::class, 'exchange']);
      Route::post('/exchangepost/{post}', [PostController::class, 'postexchange']);
      Route::get('/postexchanged', [PostController::class, 'listexchanged']);
      Route::get('/receive', [PostController::class, 'listreceive']);
      Route::get('/accept/{posted}-{exchange}', [PostController::class, 'accept']);
      Route::post('/accept/{posted}-{exchange}', [PostController::class, 'update']);
    });
  });
});
Route::get('/', [UserController::class, 'show'])->name('show');

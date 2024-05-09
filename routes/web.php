<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ArchiveDocumentController;
use App\Http\Controllers\EditDocumentController;
use App\Http\Controllers\ExpiringDocumentController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\LoginController;


use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'user', 'namespace' => 'App\Http\Controllers'], function(){     
    Route::get('/documents', [ArchiveDocumentController::class, 'allDocuments'])->name('documents.all');    
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [EditDocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}', [EditDocumentController::class, 'update'])->name('documents.update');
    Route::get('/expiring-documents', [ExpiringDocumentController::class,'index'])->name('expiring-documents.index');
    
    Route::get('specific-status-documents/status-2', [ArchiveDocumentController::class, 'specificStatusDocumentsStatus2'])->name('specific_status_documents.status2');
    Route::get('specific-status-documents/status-3', [ArchiveDocumentController::class, 'specificStatusDocumentsStatus3'])->name('specific_status_documents.status3');

});

//-----------------------------------------------------------------------------------------------------------------------------


Route::group(['middleware' => ['admin']], function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');
});




//-----------------------------------------------------------------------------------------------------------------------------

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/logout', function () {
    Auth::logout(); 
    return redirect('/login'); 
})->name('logout');


Route::get('/logout', function () {
    return redirect()->route('logout');
});
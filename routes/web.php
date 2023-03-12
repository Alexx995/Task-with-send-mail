<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MailController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/tasks', TaskController::class);

});

require __DIR__.'/auth.php';

Route::get('/statements', [TaskController::class, 'showBetweenDates'])->name('dates.show');

Route::get('excel', function () {
    return view('excel');
});


Route::get('/export', [ExportController::class, 'export'])->name('export-user');

Route::get('mail', [MailController::class, 'sendMail']);

Route::get('/download-file',  [MailController::class, 'downloadFile'])->name('downloadFile');

//Route::get('/index', function () {
//    return view('welcome');
//})->middleware('redirectIfNotAuthenticated');

//Route::get('/index', [TaskController::class, 'index']);
//Route::get('/store', [TaskController::class, 'create'])->name('task.create');
//Route::post('add-task', [TaskController::class, 'store'])->name('add.task');
//Route::get('/edit-task{task}', [TaskController::class, 'edit'])->name('task.edit');
//Route::put('/task{task}', [TaskController::class, 'update'])->name('task.update');
//Route::delete('/delete{task}', [TaskController::class, 'destroy'])->name('task.destroy');

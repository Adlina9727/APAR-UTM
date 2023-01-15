<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [HomeController::class, 'redirectLogin'])->middleware(['auth'])->name('redirectLogin');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard/store', [HomeController::class, 'store'])->middleware(['auth'])->name('dashboard.store');
// Route::get('/dashboard/file-import-export', [HomeController::class, 'uploadStudentGraduates']);
Route::post('/dashboard/file-import', [HomeController::class, 'fileImport'])->middleware(['auth'])->name('dashboard.file-import');
Route::get('/dashboard/file-export', [HomeController::class, 'fileExport'])->middleware(['auth'])->name('dashboard.file-export');
Route::get('/file', [HomeController::class, 'file'])->middleware(['auth'])->name('file');
Route::post('/upload-file', [FileController::class, 'fileUpload'])->middleware(['auth'])->name('fileUpload');
Route::post('/exportMerge', [ExcelController::class, 'exportMerge'])->middleware(['auth'])->name('exportMerge');
Route::get('/delete', [HomeController::class, 'getDelete'])->middleware(['auth'])->name('getDelete');
Route::post('/delete', [FileController::class, 'postDelete'])->middleware(['auth'])->name('postDelete');
Route::post('/delete-image', [FileController::class, 'postImageDelete'])->middleware(['auth'])->name('postImageDelete');
Route::get('/manage', [HomeController::class, 'manage'])->middleware(['auth'])->name('manage');
Route::post('/upload-image', [FileController::class, 'imageUpload'])->middleware(['auth'])->name('imageUpload');
Route::prefix('{file}')->middleware(['auth'])->group(function () {
    Route::get('/show', [ExcelController::class, 'show'])->name('show');
    Route::get('/export', [ExcelController::class, 'export'])->name('export');
});
Route::get('/excelView', [StudentController::class, 'excelView'])->middleware(['auth'])->name('excelView');
Route::get('/resultData', [StudentController::class, 'resultStudentData'])->middleware(['auth'])->name('resultData');
Route::get('/resultStudentDataMean', [StudentController::class, 'resultStudentDataMean'])->middleware(['auth'])->name('resultDataMean');
Route::get('/resultStudentDataPass', [StudentController::class, 'resultStudentDataPass'])->middleware(['auth'])->name('resultDataPass');
Route::get('/resultStudentDataPassByYear', [StudentController::class, 'resultStudentDataPassByYear'])->middleware(['auth'])->name('resultDataPassByYear');
Route::get('/kpi/year/{year}', [StudentController::class, 'resultStudentDataPass2'])->middleware(['auth'])->name('kpibyyear');



require __DIR__.'/auth.php';

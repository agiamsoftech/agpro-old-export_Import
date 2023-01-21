<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ExcelExportImportConroller;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\ShopifyController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['verify.shopify'])->name('home');

Auth::routes();

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);
// Route::post('/follow/{user}', function ()
// {
//     return ['Follow'];
// });
Route::get('/p/{post}', [PostController::class, 'show']);
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/p', [PostController::class, 'store']);
Route::post('/fetchCountries', [AddressController::class, 'fetchCountries']);
Route::post('/fetchStates', [AddressController::class, 'fetchStates']);
// Route::post('/fetchCountries', function()
// {
// return ['Hello'];
// });

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('homebk', function () {
    return view('homebk');
});

Route::get('excelsheet', function () {
    return view('excelsheet');
});
Route::post('import_excel/import', [ExcelExportImportConroller::class, 'import'])->name('import');
// Route::post('import', [PostController::class, 'import'])->name('import');
Route::get('/export', [ExcelExportImportConroller::class, 'excelData']);

Route::get('/shopify', [ShopifyController::class, 'shopify']);
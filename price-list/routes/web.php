<?php

use Illuminate\Support\Facades\Route;

// Використовувати створені Контролери
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\CompanyAdminController;

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


require __DIR__.'/auth.php';


Route::get('/', [MainController::class, 'allCompanyData']) -> name('home'); // Домашня сторінка 

// Route::get('/help', function () { return view('help'); }) -> name('help'); // Правила користування
Route::view('/help', 'help') -> name('help'); // Правила користування


// Шлях до обробки форми "Зворотній зв'язок" 
Route::post('/feedback/submit', [MainController::class, 'feedbackSubmit']) -> name('feedback-submit');

Route::middleware('auth')->group(function () {
    Route::get('/company/{companyName}/admin', [CompanyAdminController::class, 'companyAdmin']) -> name('company-admin');
    Route::get('/company/{companyName}/admin/main-info', [CompanyAdminController::class, 'mainInfoAdmin']) -> name('main-info-admin');
    Route::get('/company/{companyName}/admin/categories', [CompanyAdminController::class, 'categoriesAdmin']) -> name('categories-admin');
    Route::get('/company/{companyName}/admin/items', [CompanyAdminController::class, 'itemsAdmin']) -> name('items-admin');
    Route::get('/company/{companyName}/admin/sales', [CompanyAdminController::class, 'salesAdmin']) -> name('sales-admin');

    Route::post('/updateMainInfo', [CompanyAdminController::class, 'updateMainInfo']) -> name('updateMainInfo');
    Route::post('/addCategory', [CompanyAdminController::class, 'addCategory']) -> name('addCategory');
    Route::post('/updateCategory/{categoryId}', [CompanyAdminController::class, 'updateCategory']) -> name('updateCategory');
    Route::get('/deleteCategory/{categoryId}', [CompanyAdminController::class, 'deleteCategory']) -> name('deleteCategory');

    Route::post('/addItem', [CompanyAdminController::class, 'addItem']) -> name('addItem');


});

Route::get('/user/{userId}', [MainController::class, 'getAdminPage']) -> name('getAdminPage');

Route::get('/company', function () { return view('company.companyEmpty'); }) -> name('companyEmpty');
Route::get('/company/{companyName}', [MainController::class, 'companyData']) -> name('company');
Route::get('/company/{companyName}/{chosenCategory}', [MainController::class, 'companyData']) -> name('companyWithCategory');

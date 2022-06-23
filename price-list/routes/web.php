<?php

use Illuminate\Support\Facades\Route;

// Використовувати створені Контролери
use App\Http\Controllers\MainController;
use App\Http\Controllers\SendEmailController;
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

Route::view('/help', 'help') -> name('help'); // Правила користування

// Шлях до обробки форми "Зворотній зв'язок" 
Route::post('/feedback/submit', [SendEmailController::class, 'send']) -> name('feedback-submit');

Route::middleware('auth')->group(function () {
    Route::get('/company/{companyName}/admin', [CompanyAdminController::class, 'companyAdmin']) -> name('company-admin');
    Route::get('/company/{companyName}/admin/main-info', [CompanyAdminController::class, 'mainInfoAdmin']) -> name('main-info-admin');
    Route::get('/company/{companyName}/admin/categories', [CompanyAdminController::class, 'categoriesAdmin']) -> name('categories-admin');
    Route::get('/company/{companyName}/admin/items/{chosenCategory?}', [CompanyAdminController::class, 'itemsAdmin']) -> name('items-admin');
    Route::get('/company/{companyName}/admin/sales', [CompanyAdminController::class, 'salesAdmin']) -> name('sales-admin');

    Route::post('/updateMainInfo', [CompanyAdminController::class, 'updateMainInfo']) -> name('updateMainInfo');
    Route::post('/addCategory', [CompanyAdminController::class, 'addCategory']) -> name('addCategory');
    Route::post('/updateCategory/{categoryId}', [CompanyAdminController::class, 'updateCategory']) -> name('updateCategory');
    Route::get('/deleteCategory/{categoryId}', [CompanyAdminController::class, 'deleteCategory']) -> name('deleteCategory');

    Route::post('/addItem', [CompanyAdminController::class, 'addItem']) -> name('addItem');
    Route::post('/updateItem/{itemId}', [CompanyAdminController::class, 'updateItem']) -> name('updateItem');
    Route::get('/deleteItem/{itemId}', [CompanyAdminController::class, 'deleteItem']) -> name('deleteItem');
    Route::post('/changePriceOnCategory', [CompanyAdminController::class, 'changePriceOnCategory']) -> name('changePriceOnCategory');

    Route::post('/addSale', [CompanyAdminController::class, 'addSale']) -> name('addSale');
    Route::get('/deleteSale/{saleId}', [CompanyAdminController::class, 'deleteSale']) -> name('deleteSale');
});

Route::get('/user/{userId}', [MainController::class, 'getAdminPage']) -> name('getAdminPage');

Route::get('/company', function () { return view('company.companyEmpty'); }) -> name('companyEmpty');
Route::get('/company/{companyName}/available', [MainController::class, 'available']) -> name('available');
Route::get('/company/{companyName}/{chosenCategory?}', [MainController::class, 'companyData']) -> name('company');

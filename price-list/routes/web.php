<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () { return view('home'); }) -> name('home'); // Правила користування


// Route::get('/', [MainController::class, 'allCompanyData']) -> name('home'); // Домашня сторінка 

Route::get('/login', function () { return view('home'); }) -> name('login'); // Авторизація 

Route::get('/registration', function () { return view('home'); }) -> name('registration'); // Реєстрація

Route::get('/help', function () { return view('home'); }) -> name('help'); // Правила користування

// Route::get('/login', function () { return view('login'); }) -> name('login'); // Авторизація 

// Route::get('/registration', function () { return view('registration'); }) -> name('registration'); // Реєстрація

// Route::get('/help', function () { return view('help'); }) -> name('help'); // Правила користування


// Шлях до обробки форми "Зворотній зв'язок" 
// Route::post('/feedback/submit', [MainController::class, 'feedbackSubmit']) -> name('feedback-submit');

// // Шлях до обробки форми "Реєстрація" та "Авторизація" 
// Route::post('/registration/submit', [UserLoginController::class, 'registrationSubmit']) -> name('registration-submit');
// Route::post('/login/submit', [UserLoginController::class, 'loginSubmit']) -> name('login-submit');

// Route::get('/company', function () { return view('companyEmpty'); }) -> name('companyEmpty');
// Route::get('/company/{companyName}', [MainController::class, 'companyData']) -> name('company');
// Route::get('/company/{companyName}/{chosenCategory}', [MainController::class, 'companyData']) -> name('companyWithCategory');

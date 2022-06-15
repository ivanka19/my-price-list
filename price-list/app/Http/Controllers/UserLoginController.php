<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserLoginRequest; // Підключення запиту для валідації форми
use App\Http\Requests\UserRegRequest;

use App\Models\Company; // Підключення Моделі Company (companies table in DB)

class UserLoginController extends Controller
{
    // Функція, що здійснює валідацію форми реєстрації та додає запис в БД
    public function registrationSubmit(UserRegRequest $request) {
        // Валідація даних відбувається в запиті UserRegRequest,
        // якщо виявляється помилка, далі функція не виконується, а користувач отримує повідомлення про помилку

        // Додавання запису про компанію у таблицю БД `companies` (реєстрація компанії)
        // $company = new Company();
        // $company -> companyName = $request->input('company-name');
        // $company -> userName = $request->input('user-name');
        // $company -> email = $request->input('email');
        // $company -> password = $request->input('password');
        // $company -> save();

        // // Перенаправлення користувача на сторінку login з повідомленням про успішну авторизацію
        // return redirect()->route('login')->with('success', 'Ваша компанія була успішно зареєстрована. Тепер авторизуйтесь у системі.');
    }

    // Функція, що здійснює авторизацію користувача
    public function loginSubmit(UserLoginRequest $request) {
        // Валідація даних відбувається в запиті UserLoginRequest,
        // якщо виявляється помилка, далі функція не виконується, а користувач отримує повідомлення про помилку

        // dd($request);
    }
}
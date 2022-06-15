<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FeedbackRequest; // Підключення запиту для валідації форми

use App\Models\Company; // Підключення Моделі Company (companies table in DB)
use App\Models\Category;

class MainController extends Controller
{
    // Функція, що оброблює форму "Зв’яжіться з нами"
    public function feedbackSubmit(FeedbackRequest $request) {
        // Валідація даних відбувається в запиті FeedbackRequest,
        // якщо виявляється помилка, далі функція не виконується, а користувач отримує повідомлення про помилку
    }
    
    // Функція, що повертає на головну сторінку інформацію про всі компанії (в каруселі)
    public function allCompanyData() {
        return view('home', ['companiesData' => Company::all()]);
    }

    // Функція, що повертає дані про конкретну компанію на її сторінку
    public function companyData($companyName, $chosenCategory=null)
    {
        $company = Company::where('companyName', $companyName)->first();

        if ($company == null) {
            // Якщо компанії не знайдено
            return view('companyEmpty');
        }
        if ($chosenCategory == null) {
            // Вивід сторінки з усіма товарами
            return view('company.company', compact('company'));
        }
        else {
            // Якщо передано категорію для сортування
            return view('company.company', compact('company', 'chosenCategory'));
        }
    }



    
}
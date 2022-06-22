<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Models\Company; // Підключення Моделі Company (companies table in DB)
use App\Models\Category;

class MainController extends Controller
{
    // Функція, що повертає на головну сторінку інформацію про всі компанії (в каруселі)
    public function allCompanyData() {
        return view('home', ['companiesData' => Company::all()]);
    }

    // Функція, що повертає дані про конкретну компанію на її сторінку
    public function companyData($companyName, $chosenCategory=null)
    {
        $company = Company::where('companyName', $companyName)->first();

        if ($company == null) {
            return view('company.companyEmpty'); // Якщо компанії не знайдено
        }
        if ($chosenCategory == null) {
            return view('company.company', compact('company')); // Вивід сторінки з усіма товарами
        }
        else {
            return view('company.company', compact('company', 'chosenCategory')); // Якщо передано категорію для сортування
        }
    }
    
    // Перенаправлення користувача на сторінку адміністрування
    public function getAdminPage($userId)
    {
        $company = Company::where('userId', $userId)->first();
        if ($company != null)
            return redirect('/company/'.$company->companyName.'/admin');
        return view('company.companyEmpty'); // Якщо компанії не знайдено
    }
}
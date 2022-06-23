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
        else {
            if ($chosenCategory == null) {
                $items = $company->items; // Всі товари
            }
            else {
                $items = Category::where('categoryName', $chosenCategory)->first()->items; // Якщо передано категорію для сортування
            }
            return view('company.company', compact('company', 'chosenCategory', 'items'));
        }
    }

    public function available($companyName, $available = true) {
        $company = Company::where('companyName', $companyName)->first();
        $items = $company->itemsAvailable;
        return view('company.company', compact('company', 'items', 'available'));
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
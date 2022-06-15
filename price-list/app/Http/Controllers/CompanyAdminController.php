<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company; // Підключення Моделі Company (companies table in DB)
use App\Models\Category;

class CompanyAdminController extends Controller
{
    public function companyAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->first();
        return view('company.admin.admin', compact('company'));
    }

    public function mainInfoAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->first();
        return view('company.admin.mainInfo', compact('company'));
    }

    public function categoriesAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->first();
        return view('company.admin.categories', compact('company'));
    }

    public function itemsAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->first();
        return view('company.admin.items', compact('company'));
    }
    
    public function salesAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->first();
        return view('company.admin.sales', compact('company'));
    }
}

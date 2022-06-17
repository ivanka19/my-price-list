<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company; // Підключення Моделі Company (companies table in DB)
use App\Models\Category;

class CompanyAdminController extends Controller
{
    public function companyAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->where('userId', session('authUser'))->first();
        if ($company)
            return view('company.admin.admin', compact('company'));
        return view('company.companyEmpty');
    }

    public function mainInfoAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->where('userId', session('authUser'))->first();
        if ($company)
            return view('company.admin.mainInfo', compact('company'));
        return view('company.companyEmpty');
    }

    public function categoriesAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->where('userId', session('authUser'))->first();
        if ($company)
            return view('company.admin.categories', compact('company'));
        return view('company.companyEmpty');
    }

    public function itemsAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->where('userId', session('authUser'))->first();
        if ($company)
            return view('company.admin.items', compact('company'));
        return view('company.companyEmpty');
    }
    
    public function salesAdmin($companyName) {
        $company = Company::where('companyName', $companyName)->where('userId', session('authUser'))->first();
        if ($company)
            return view('company.admin.sales', compact('company'));
        return view('company.companyEmpty');
    }
}

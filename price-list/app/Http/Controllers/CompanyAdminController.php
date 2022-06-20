<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function changemaininfo(Request $request) {
        $request->validate([
            'city' =>  'nullable|min:2|max:30',
            'tel' => 'nullable|max:15',
            'logo-file' => 'nullable|image|max:10240',
            'color' => 'nullable|max:15',
            'shortDescr' => 'nullable|max:30',
            'descr' => 'nullable',
            'instagram' => 'nullable|max:70|url',
            'facebook' => 'nullable|max:70|url',
            'youtube' => 'nullable|max:70|url',
            'tiktok' => 'nullable|max:70|url',
        ]);

        $company = Company::where('companyId', $request -> input('companyId'))->first();
        if ($request->isMethod('post') && $request->file('logo-file')) {
            $file = $request->file('logo-file');
            $upload_folder = 'public/images/'.$company->companyName;
            $filename = $file->getClientOriginalName();
            Storage::putFileAs($upload_folder, $file, $filename);
            
            if(Storage::exists('public/images/'.$company->companyName.'/'.$company->logo)){
                Storage::delete('public/images/'.$company->companyName.'/'.$company->logo);
            }

            Company::where('companyId', $request->input('companyId'))->update([
                'logo' => $request -> file('logo-file')->getClientOriginalName(),
            ]);
        }

        Company::where('companyId', $request->input('companyId'))->update([
            'phone' => $request -> input('tel'),
            'city' => $request -> input('city'),
            'shortDescr' => $request -> input('shortDescr'),
            'companyDescription' => $request -> input('descr'),
            'color' => $request -> input('color'),
            'instagram' => $request -> input('instagram'),
            'facebook' => $request -> input('facebook'),
            'youTube' => $request -> input('youtube'),
            'tikTok' => $request -> input('tiktok'),
        ]); 

        return redirect()->back()->with('success', 'Дані було успішно змінено');;
    }
}
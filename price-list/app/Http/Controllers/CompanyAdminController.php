<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Company; // Підключення Моделі Company (companies table in DB)
use App\Models\Category;
use App\Models\Item;
use App\Models\Sale;

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

    public function updateMainInfo(Request $request) {
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

        return redirect()->back()->with('success', 'Дані було успішно додано');;
    }

    public function addCategory(Request $request) {
        $request->validate([ 'new-category' =>  'required|min:2|max:50' ]);
        $category = Category::create([
            'categoryName' => $request->input('new-category'),
            'companyId' => $request->input('company-id'),
        ]);
        return redirect()->back()->with('success', 'Дані було успішно змінено');;
    }

    public function updateCategory($categoryId, Request $request) {
        $request->validate([ 'category-name' =>  'required|min:2|max:50' ]);
        Category::where('categoryId', $categoryId)->update([ 'categoryName' => $request -> input('category-name'), ]); 
        return redirect()->back()->with('success', 'Дані було успішно змінено');;
    }

    public function deleteCategory($categoryId) {
        $category = Category::where('categoryId', $categoryId)->first();
        if (session('authUser') == $category->company->userId) {
            Category::where('categoryId', $categoryId)->delete();
            return redirect()->back()->with('success', 'Дані було успішно змінено');;
        }
        else { return view('company.companyEmpty'); }
    }


    public function addItem(Request $request) {
        $request->validate([
            'new-item-name' => 'required|min:2|max:50',
            'new-item-category' => 'required|not_in:0',
            'new-item-price' => 'required|numeric|min:1',
            'new-item-file' => 'required|image|max:10240',
            'new-item-descr' => 'nullable|min:10',
        ]);

        $company = Category::where('categoryId', $request->input('new-item-category'))->first()->company;

        if ($request->isMethod('post') && $request->file('new-item-file')) {
            $file = $request->file('new-item-file');
            $upload_folder = 'public/images/'.$company->companyName;
            $filename = $file->getClientOriginalName();
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $item = Item::create([
            'itemName' => $request->input('new-item-name'),
            'price' => $request->input('new-item-price'),
            'description' => $request->input('new-item-descr'),
            'itemPhoto' => $request -> file('new-item-file')->getClientOriginalName(),
            'categoryId' => $request->input('new-item-category'),

            // 'available' => $request->input(''),
        ]);

        return redirect()->back()->with('success', 'Дані було успішно змінено');;
    }

    public function updateItem($itemId, Request $request) {
        $request->validate([
            'item-name' => 'required|min:2|max:50',
            'item-price' => 'required|numeric|min:1',
            'item-descr' => 'nullable|min:10',
        ]);

        $avaible = 0;
        if ($request->input('avaible') != null) { $avaible = 1; }

        Item::where('itemId', $itemId)->update([
            'itemName' => $request->input('item-name'),
            'price' => $request->input('item-price'),
            'description' => $request->input('item-descr'),
            'available' => $avaible,
        ]);
        return redirect()->back()->with('success', 'Дані було успішно змінено');;
    }

    public function deleteItem($itemId) {
        $item = Item::where('itemId', $itemId)->first();
        if (session('authUser') == $item->category->company->userId) {
            if (Storage::exists('public/images/'.$item->category->company->companyName.'/'.$item->itemPhoto)) {
                Storage::delete('public/images/'.$item->category->company->companyName.'/'.$item->itemPhoto);
            }
            Item::where('itemId', $itemId)->delete();
            return redirect()->back()->with('success', 'Дані було успішно змінено');;
        }
        else { 
            return view('company.companyEmpty'); 
        }
    }

    
    public function addSale(Request $request) {
        $request->validate([
            'categoryId' => 'required|not_in:0|unique:sales',
            'new-sale-percent' => 'required|integer|min:1|max:100',
        ]);

        $sale = Sale::create([
            'percent' => $request->input('new-sale-percent'),
            'categoryId' => $request->input('categoryId'),
        ]);

        return redirect()->back()->with('success', 'Дані було успішно змінено');;
    }

    public function deleteSale($saleId) {
        $sale = Sale::where('saleId', $saleId)->first();
        if (session('authUser') == $sale->category->company->userId) {
            Item::where('saleId', $saleId)->delete();
            return redirect()->back()->with('success', 'Дані було успішно змінено');;
        }
        else { 
            return view('company.companyEmpty'); 
        }
    }
}
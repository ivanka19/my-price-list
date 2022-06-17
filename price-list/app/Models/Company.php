<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function categories(){
        // Відношення One To Many: функція повертає всі категорії, що додані до компанії
        return $this->hasMany(Category::class, 'companyId', 'companyId');
    }

    public function items(){
        // Відношення Has Many Through: функція повертає всі товари, що належать компанії (як InnerJoin в MySql)
        return $this->hasManyThrough(Item::class, Category::class, 'companyId', 'categoryId', 'companyId', 'categoryId');
    }
    
    public function sales(){
        return $this->hasManyThrough(Sale::class, Category::class, 'companyId', 'categoryId', 'companyId', 'categoryId');
    }
    
    public function itemsFromCategory($chosenCategory){
        $category = Category::where('categoryName', $chosenCategory)->first();
        return Item::where('categoryId', $category->categoryId)->get();
    }

    public function user(){
        // Повертає користувача, що є власником компанії
        return $this->belongsTo(User::class, 'userId', 'userId'); 
    }
}
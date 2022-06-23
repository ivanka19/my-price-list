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

    public function itemsAvailable(){
        return $this->items()->where('available', 1);
    }

    public function user(){
        // Повертає користувача, що є власником компанії
        return User::where('id', $this->userId)->first();
    }
}
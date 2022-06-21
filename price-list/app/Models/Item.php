<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function category(){
        // Відношення One To Many (Inverse): функція повертає категорію певного товару
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId'); 
    }
}
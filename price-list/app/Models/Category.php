<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function company(){
        return $this->belongsTo(Company::class, 'companyId', 'companyId'); 
    }

    public function items(){
        return $this->hasMany(Item::class, 'categoryId', 'categoryId');
    }

    public function sale(){
        return $this->hasOne(Sale::class, 'categoryId', 'categoryId');
    }
}

<?php

namespace App\Models;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    public function sub_category()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

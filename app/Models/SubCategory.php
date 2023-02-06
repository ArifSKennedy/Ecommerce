<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public $guarded = [];
    public $timestamp = true;
    public $table = 'sub_categorys';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}

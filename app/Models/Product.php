<?php

namespace App\Models;
use App\Models\Image;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Cart;
use App\Models\Riwayat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // public $guarded = ['id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}

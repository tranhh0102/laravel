<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sale',
        'price',
        'size'
    ];
    public function details(){
        return $this->hasMany(ProductDetail::class);
    }
    public function images()
    {
        return $this->morphOne(Image::class,'imageable');
    }
    public function assignCategory($categoryIds){
        return $this->categories()->sync($categoryIds);
    }
    public function categories()
    {
    return $this->belongsToMany(Category::class);
    }

    public function getBy($dataSearch, $categoryId)
    {
        return $this->whereHas('categories', fn($q) => $q->where('category_id', $categoryId))->paginate(10);
    }

}

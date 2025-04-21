<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOption;

class Product extends Model
{    
    protected $fillable = ['name', 'description'];

    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function byCategory()
    {
        $products = Product::all();
        $results = [];
        
        foreach ($products as $product) {
            if (!isSet($results[$product->category->id])) {
                $results[$product->category_id]['data'] = $product->category->toArray();
            }
            unset($product->category);
            $results[$product->category_id][$product->id] = $product->toArray();
        }

        return $results;
    }


}

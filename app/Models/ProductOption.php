<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductOption extends Model
{
    protected $fillable = ['name', 'description'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}

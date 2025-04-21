<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'category_type_id', 'icon', 'color'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function type()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }

    public static function fields()
    {
        return array (

            'name' => [
                "type" => 'string',
                "label" => 'Name',
            ],
            'description' => [
                "type" => 'text',
                "label" => 'Description',
            ],
            'image' => [
                "type" => 'string',
                "label" => 'Image',
            ],
            'standalone' => [
                "type" => 'boolean',
                "label" => 'Standalone',
            ],
            'priority'  => [
                "type" => 'boolean',
                "label" => 'Priority',
            ],
            
        );
    }

}

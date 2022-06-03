<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Category extends Model
{
    use HasFactory;
    protected $fillable=['category_name','category_image','vendor_id'];

    static function category()
     {
       return Category::
            select('category_name','category_image','id')
           ->get();
     }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
     protected function categoryName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

}

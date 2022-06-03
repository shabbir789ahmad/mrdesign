<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\BranchScope;
class Brand extends Model
{
    use HasFactory;
    protected $fillable=['brand_name','brand_image','vendor_id'];

    // protected static function boot()
    // {
    //     parent::boot();
  
    //     static::addGlobalScope(new BranchScope);
    // }

    protected function brandName():Attribute
    {
        return Attribute::make(
          get: fn ($value) => ucfirst($value),
        );
    }
 }

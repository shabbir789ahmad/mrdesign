<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable=[
       
       'stock',
       'price',
       'discount_price',
       'purchasing_price',
       'product_tax',
       'product_id',
    ];
}

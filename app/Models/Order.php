<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
     
     'address',
     'state',
     'city',
     'zip',
     'payment_status',
     'order_total',
     'user_id'
    ];
}

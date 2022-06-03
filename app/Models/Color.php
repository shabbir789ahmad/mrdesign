<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable=['color','color_name'];

    public static function colors()
    {
        return Color::select('color','color_name','id')->get();
    }
}

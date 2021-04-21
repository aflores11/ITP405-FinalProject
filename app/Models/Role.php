<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name'];

    public static function getUser(){
        return self::where('slug', '=', 'user')->first();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\God;

class Damage extends Model
{
    use HasFactory;
    protected $fillable = ['damage_type'];

    public function gods(){
        return $this->hasMany(God::class);
    }


}

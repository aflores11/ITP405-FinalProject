<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\God;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['role_type'];

    public function gods(){
        return $this->hasMany(God::class);
    }


}

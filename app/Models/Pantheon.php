<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\God;

class Pantheon extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function gods(){
        return $this->hasMany(God::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pantheon;
use App\Models\Type;
use App\Models\Damage;

class God extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type_id', 'pantheon_id', 'damage_id'];

    public function pantheon(){
        return $this->belongsTo(Pantheon::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function damage(){
        return $this->belongsTo(Damage::class);
    }
     
}

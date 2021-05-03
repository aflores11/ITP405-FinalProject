<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function gods(){
        return $this->belongsToMany(God::class)->withTimestamps()->orderBy('created_at', 'desc');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

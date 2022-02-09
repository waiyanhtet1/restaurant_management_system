<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function dish(){
        return $this->belongsTo(Dishes::class);
    }

    public function table(){
        return $this->belongsTo(Tables::class);
    }
}

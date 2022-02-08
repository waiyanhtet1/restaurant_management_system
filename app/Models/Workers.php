<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;
    public function role(){
        return $this->belongsTo(Roles::class,'role_id');
    }
}

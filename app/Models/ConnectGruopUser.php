<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectGruopUser extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function group()
    {
        return $this->belongsTo(User::class,'group_id');
    }
}

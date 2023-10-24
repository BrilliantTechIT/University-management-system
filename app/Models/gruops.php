<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gruops extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class,'create_by');
    }
}

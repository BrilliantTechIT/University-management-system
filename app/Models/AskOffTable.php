<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskOffTable extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class,'create_by');
    }

    public function users_accept()
    {
        return $this->belongsTo(User::class,'accept_by');
    }

    public function users_cash()
    {
        return $this->belongsTo(User::class,'cash_by');
    }
}

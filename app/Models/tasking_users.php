<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasking_users extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function task()
    {
        return $this->belongsTo(tasking::class,'task_id');
    }
}

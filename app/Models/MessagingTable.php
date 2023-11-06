<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessagingTable extends Model
{
    use HasFactory;

    public function users_send()
    {
        return $this->belongsTo(User::class,'create_by');
    }

    public function users_get()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}

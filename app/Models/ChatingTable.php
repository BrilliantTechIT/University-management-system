<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatingTable extends Model
{
    use HasFactory;
    public function send()
    {
        return $this->belongsTo(User::class,'id_send');
    }

    public function order()
    {
        return $this->belongsTo(CashMoneyTable::class,'id_order');
    }
}

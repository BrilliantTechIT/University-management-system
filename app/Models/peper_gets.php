<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peper_gets extends Model
{
    use HasFactory;
    protected $fillable=['id_peper','id_sends','reply'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function peper(){
        return $this->belongsTo(PepersTable::class,'id_peper','uid');
    }
}

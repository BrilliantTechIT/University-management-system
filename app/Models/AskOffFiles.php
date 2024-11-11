<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskOffFiles extends Model
{
    use HasFactory;
    protected $fillable=['id_askoff','file'];
    public function askoff()
    {
        return $this->belongsTo(AskOffTable::class,'id_askoff');
    }
}

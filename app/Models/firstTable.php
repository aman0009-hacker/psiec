<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class firstTable extends Model
{
    use HasFactory;
    public function made()
    {
     return  $this->hasMany(secondTable::class,'firstTable_id','id');
    }
}

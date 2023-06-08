<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alldata extends Model
{
    use HasFactory;
    public function data()
    {
        return $this->belongsTo(maindata::class,'maindata','id');
    }
    public function datas()
    {
        return $this->belongsTo(belowdata::class,'belowdata','id');
    }
    public function datass()
    {
        return $this->belongsTo(datasub::class,'datasub','id');
    }
}

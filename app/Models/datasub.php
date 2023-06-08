<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class datasub extends Model
{
    use HasFactory;
    use ModelTree;
    public function datas()
    {
        return $this->belongsTo(belowdata::class,'belowdata_id','id');
    }
    public function ma()
    {
        return $this->hasMany(alldata::class,'datasub','id');
    }
}

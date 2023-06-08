<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class belowdata extends Model
{
    use HasFactory;
    use ModelTree;

    public function miss()
    {
       return $this->belongsTo(maindata::class,'maindata_id','id');
    }
    public function missu()
    {
return $this->hasMany(datasub::class,'belowdata_id','id');
    }
    public function missi()
    {
return $this->hasMany(alldata::class,'belowdata','id');
    }

}

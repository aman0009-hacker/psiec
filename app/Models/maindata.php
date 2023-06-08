<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;

class maindata extends Model
{
    use HasFactory;
    use ModelTree;
public function make()
{
    $this->hasMany(belowdata::class,'maindata_id','id');
}
public function made()
{
    $this->hasMany(alldata::class,'maindata','id');
}
}

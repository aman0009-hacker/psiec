<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class category extends Model
{
    use HasFactory;
    public function relate()
    {
     return   $this->hasOne(product::class,'id','product_id');
    }
   
}

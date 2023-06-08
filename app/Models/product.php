<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  use HasFactory;
  use ModelTree;
  
    protected $table="products";
  function part()
  {
    
  }
  
}

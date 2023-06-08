<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class the_tableRelation extends Model
{
    use HasFactory;
    public static function boot()
    {
      parent::boot();
      self::creating(function ($model) {
        $model->id = (string) Uuid::generate();
      });
    }
    public function getIncrementing()
    {
        return false;
    }
    public function getRouteKeyName()
    {
      return 'uuid';
    }
}

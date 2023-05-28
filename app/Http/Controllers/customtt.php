<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Layout\Content;
use App\Admin\Forms\custom;
use App\Models\customTable;

class customtt extends Controller
{
    public function custom(Content $content)
    {
    
        return $content->body(new custom());
    }
    
}

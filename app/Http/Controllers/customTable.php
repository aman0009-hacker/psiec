<?php

namespace App\Http\Controllers;

use App\Admin\Forms\theForm;
use App\Admin\Forms\custom;
use Illuminate\Http\Request;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;
class customTable extends Controller
{
    public function custom(Content $content,$data)

{
    $data=$this->find($data);
    dd($data);
    // return $content->body(new custom($id));
}
}

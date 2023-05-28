<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Forms\theForm;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use App\Models\customTable;
use Encore\Admin\Grid;

class userController extends Controller
{
    public function setting(Content $content)
    {
$forms = [
            'basic'    => Settings\Basic::class,
            'site'     => Settings\Site::class,
            'upload'   => Settings\Upload::class,
            'database' => Settings\Database::class,
            'develop'  => Settings\Develop::class,
        ];
      


    $gird =new Grid(new customTable);
    $gird->column('name');
    $gird->email('name');

        return $content
            ->title('Form')
            ->body(new theForm())
            ->body($gird);     
  
        }
        
    
}

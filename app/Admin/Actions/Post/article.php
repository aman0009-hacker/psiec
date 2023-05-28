<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class article extends RowAction
{
    public $name = 'pdf';

    public function handle(Model $model)
    {
       

        return $this->response()->success('Success message.')->refresh();
    }

}
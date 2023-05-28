<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use App\Models\customTable;


class custom_edit extends RowAction
{
    public $name = 'edit';

    public function handle(Model $model)
    {
        // $model ...
    

        return $this->response()->success('Success message.')->refresh();
    }
    // public function href()
    // {
    //  $table="customTable";
    //  return "$table/".$this->getkey()."/edit";
    // }

}
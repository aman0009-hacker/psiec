<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchReplicate extends BatchAction
{
    public $name = 'Download';
    protected $selector = '.report-posts';

    public function handle(Collection $collection)
    {
        foreach ($collection as $model) {
            $model->delete();
        }

        return $this->response()->success('Success message...')->refresh();
    }
    public function dialog()
    {
        $this->confirm('Are you sure to copy this row?');
    }
    public function html()
    {
        return "<a class='report-posts btn btn-sm btn-danger'><i class='fa fa-info-circle'></i>Report</a>";
    }

}
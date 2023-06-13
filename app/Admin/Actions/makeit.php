<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;

class makeit extends Action
{
    protected $selector = '.makeit';

    public function handle(Request $request)
    {
        // $request ...

        return $this->response()->success('Success message...')->refresh();
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-default makeit"></a>
HTML;
    }
}
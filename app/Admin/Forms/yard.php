<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\yardsupervisor;

// use App\Admin\Forms\yard;

use Encore\Admin\Controllers\AdminController;

use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Admin;

class yard extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $form = new Form(new yardsupervisor);
        $form->column(1/3, function ($form) {
            $form->text('product', __('Product'));
        });
        $form->text('notes', __('Notes'));
        $form->number('supervisor_id', __('Supervisor id'));
        $form->column(1/3, function ($form) {
            $form->number('quantity', __('Quantity'));
        });
        $form->column(1/3, function ($form) {
            $form->html('<a href="#" class="btn btn-success"onclick="add()">+</a>&nbsp;&nbsp;<a href="#" class="btn btn-success"onclick="sub()">-</a>');
        });
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'name'       => 'John Doe',
            'email'      => 'John.Doe@gmail.com',
            'created_at' => now(),
        ];
    }
}

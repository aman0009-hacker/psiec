<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\custom;
use App\Admin\Forms\yard;
use App\Models\yardsupervisor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Admin;

class supervisorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'yardsupervisor';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new yardsupervisor());

        $grid->column('id', __('Id'));
        $grid->column('product', __('Product'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('notes', __('Notes'));
        $grid->column('supervisor_id', __('Supervisor id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(yardsupervisor::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product', __('Product'));
        $show->field('quantity', __('Quantity'));
        $show->field('notes', __('Notes'));
        $show->field('supervisor_id', __('Supervisor id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new yardsupervisor());
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
      

      
        $form->setAction('makeit');

return $form;
    }
}

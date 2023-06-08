<?php

namespace App\Admin\Controllers;

use App\Models\belowdata;
use App\Models\maindata;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class belowdController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'belowdata';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new belowdata());

        $grid->column('id', __('Id'));
        // $grid->column('parent_id', __('Parent id'));
        $grid->column('miss.title', __('Maindata'));
        $grid->column('title', __('Title'));
        // $grid->column('order', __('Order'));
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
        $show = new Show(belowdata::findOrFail($id));

        $show->field('id', __('Id'));
        // $show->field('parent_id', __('Parent id'));
        $show->field('title', __('Title'));
        $show->field('maindata_id', __('Maindata'));
        // $show->field('order', __('Order'));
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
        $form = new Form(new belowdata());

        // $form->text('parent_id', __('Parent id'));
        $form->text('title', __('Title'));
        $form->select('maindata_id', __('Maindata'))->options((new maindata)::selectOptions());
        // $form->text('order', __('Order'));

        return $form;
    }
}

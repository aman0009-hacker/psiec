<?php

namespace App\Admin\Controllers;

use App\Models\belowdata;
use App\Models\datasub;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class subdController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'datasub';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new datasub());

        $grid->column('id', __('Id'));
        // $grid->column('parent_id', __('Parent id'));
        $grid->column('datas.title', __('Below data'));
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
        $show = new Show(datasub::findOrFail($id));

        $show->field('id', __('Id'));
        // $show->field('parent_id', __('Parent id'));
        $show->field('title', __('Title'));
        $show->field('belowdata_id', __('Below data'));
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
        $form = new Form(new datasub());

        // $form->text('parent_id', __('Parent id'));
        $form->text('title', __('Title'));
        $form->select('belowdata_id', __('Below data'))->options((new belowdata)::selectOptions());
        // $form->text('order', __('Order'));

        return $form;
    }
}

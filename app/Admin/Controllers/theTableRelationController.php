<?php

namespace App\Admin\Controllers;

use App\Models\the_tableRelation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class theTableRelationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'the_tableRelation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new the_tableRelation());

        $grid->column('id', __('Id'));
        $grid->column('the_table_id', __('The table id'));
        $grid->column('address', __('Address'));
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
        $show = new Show(the_tableRelation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('the_table_id', __('The table id'));
        $show->field('address', __('Address'));
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
        $form = new Form(new the_tableRelation());

        $form->text('the_table_id', __('The table id'));
        $form->text('address', __('Address'));

        return $form;
    }
}

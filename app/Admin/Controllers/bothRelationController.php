<?php

namespace App\Admin\Controllers;

use App\Models\bothRelation;
use App\Models\product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class bothRelationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'bothRelation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new bothRelation());

        $grid->column('id', __('Id'));
        $grid->column('product name', __('Product name'));
        $grid->column('category name', __('Category name'));
        $grid->column('name', __('Name'));
        $grid->column('number', __('Number'));
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
        $show = new Show(bothRelation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product name', __('Product name'));
        $show->field('category name', __('Category name'));
        $show->field('name', __('Name'));
        $show->field('number', __('Number'));
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
        $form = new Form(new bothRelation());

        $form->select('name')->options((new product())::selectOptions());
        $form->text('category name', __('Category name'));
        $form->text('name', __('Name'));
        $form->number('number', __('Number'));

        return $form;
    }
}

<?php

namespace App\Admin\Controllers;

use App\Models\the_table;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Widgets\Table;


class theTableController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'the_table';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new the_table());

        $grid->column('id', __('Id'));
        // $grid->column('', __(''));
        
$grid->column('name', 'Name')->modal(function ($model) {

    $comments = $model->makeRelation()->take(10)->get()->map(function ($comment) {
        return $comment->only(['id', 'address', 'created_at']);
    });

    return new Table(['ID', 'content', 'release time'], $comments->toArray());
});
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
        $show = new Show(the_table::findOrFail($id));

        $show->field('id', __('Id'));
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
        $form = new Form(new the_table());

        $form->text('name', __('Name'));
        $form->number('number', __('Number'));

        return $form;
    }
}

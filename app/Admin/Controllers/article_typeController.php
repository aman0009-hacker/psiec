<?php

namespace App\Admin\Controllers;

use App\Models\article_type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class article_typeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'article_type';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new article_type());

        $grid->column('id', __('Id'));
        // $grid->column('parent_id', __('Parent id'));
        $grid->column('title', __('Title'));
        $grid->column('order',__('Order'))->bool();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }
    // public function index(Content $content)
    // {
    //     $tree=new tree(new article_type);
    //     return $content->header('categories')->body($tree);
    // }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(article_type::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('title', __('Title'));
        $show->field('order', __('Order'));
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
        $form = new Form(new article_type());

        $form->select('parent_id', __('Parent id'))->options((new article_type)::selectOptions());
        $form->text('title', __('Title'));
        $states=[
            "on"=>["value"=>1,"text"=>"enable",'color'=>'success'],
            "off"=>['value'=>0,"text"=>"disable",'color'=>"danger"]
        ];
        $form->switch('order', __('Order'))->states($states);

        return $form;
    }
}

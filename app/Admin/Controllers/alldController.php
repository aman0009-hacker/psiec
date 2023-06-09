<?php

namespace App\Admin\Controllers;

use App\Models\alldata;
use App\Models\belowdata;
use App\Models\datasub;
use App\Models\maindata;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Admin;

class alldController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'alldata';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new alldata());

        $grid->column('id', __('Id'));
        $grid->column('data.title', __('Maindata'));
        $grid->column('datas.title', __('Belowdata'));
        $grid->column('datass.title', __('Datasub'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        admin::html("<h1>this is html</h1>");

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
        $show = new Show(alldata::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('maindata', __('Maindata'));
        $show->field('belowdata', __('Belowdata'));
        $show->field('datasub', __('Datasub'));
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
        $form = new Form(new alldata());
        
        $form->select('maindata', __('Maindata'))->options((new maindata())::selectOptions())->load('belowdata','api/maindata');
        
        $form->select('belowdata', __('Belowdata'))->options((new belowdata())::selectOptions())->load('datasub','api/mainsub');
        // $form->select('belowdata', __('Belowdata'))->options((new belowdata))->load('datasub','api/mainsub');
        
        $form->select('datasub', __('Datasub'))->options((new datasub())::selectOptions());

        

        return $form;
    }
}

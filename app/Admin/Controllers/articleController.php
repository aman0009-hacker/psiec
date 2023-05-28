<?php

namespace App\Admin\Controllers;


use App\Admin\Forms\theForm;
use App\Models\article;
use App\Models\article_type;
use App\Models\customTable;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\Post\Replicate;
// use App\Admin\Actions\Post\article;
Use Encore\Admin\Widgets\Table;
use App\Admin\Actions\Post\BatchReplicate;
use Encore\Admin\Layout\Content;
use App\Admin\Actions\Post\custom_edit;




class articleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    // protected function grid(Content $content)
    // {
       
    // }
    public function index(Content $content)
    {
       
        $grid = new Grid(new article());
        $grid->column('id', __('Id'));
        $grid->column('name', 'name')->modal('latest comment', function ($model) {
            
            $comments = $model->main()->take(10)->get()->map(function ($comment) {
                return $comment->only(['id', 'title', 'created_at']);
            });
            
            return new Table(['ID', 'title', 'release time'], $comments->toArray());
        });
        
        // $grid->column('name', __('Name'));

        $grid->column('main.title', __('Type id'));
        // $grid->column('sub_title')->copyable();
        $grid->column('sub_title', __('Sub title'));
        $grid->column('thumbnail', __('Thumbnail'))->image('','60','60');
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        
        
        $grid->actions(function ($actions) {
            
            $actions->add(new Replicate);
        });
        
        $grid->tools(function ($tools) {
            $tools->append(new BatchReplicate());
        });
        

      
      


        
        
        
        
        
        
        
        
      
        
        
        
        
   
        
        return $content
             ->body($grid)
            ->body(new theForm());
      
      
       
    
    }
    
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('type_id', __('Type id'));
        $show->field('sub_title', __('Sub title'));
        $show->field('thumbnail', __('Thumbnail'));
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
        $form = new Form(new article());

        $form->text('name', __('Name'));
        $form->select('type_id', __('Type id'))->options((new article_type)::selectOptions());
        $form->summernote('sub_title', __('Sub title'));
        $form->image('thumbnail', __('Thumbnail'));

        return $form;
    }
}

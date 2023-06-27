<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\editing;
use App\Admin\Forms\custom;
use App\Admin\Forms\yard;
use App\Models\product;
use App\Models\yardsupervisor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Admin;
use Encore\Admin\Grid\Filter;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $grid->column('date',__('Date'));
        $grid->column('product', __('Product'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('amount', __('Amount'));
        $grid->column('Total')->display(function()
        {
         return   $this->quantity * $this->amount;
        });
           
        $grid->column('notes', __('Notes'));
        $grid->column('supervisor_id', __('Supervisor id'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        
        
        
        
        
        
//         $grid->filter(function($filter){
         
//             $filter->between('created_at','Date')->date();
           
   
         
//             if(request('created_at'))
//     {
//      $data= implode(',', request('created_at'));
//       $dat_array=explode(',',$data);
//       $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dat_array[0])->startOfDay()->toDateTimeString();
//        $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dat_array[1])->endOfDay()->toDateTimeString();
//     dd($startDateTime);
//    return  DB::table('yardsupervisor')->whereBetween('created_at',[  $dat_array[0],  $dat_array]);
    
        
    
//     }
//     });





    $grid->filter(function (Filter $filter) {
        $filter->disableIdFilter();
        $filter->between('date')->date();
    
      
    
        // $filter->model()->where(function ($query) use ($filter) {
        //     $startDateTime = $filter->input('created_at.start');
        //     $endDateTime = $filter->input('created_at.end');
    
        //     if ($startDateTime && $endDateTime) {
        //         $startDateTime = date('Y-m-d 00:00:00', strtotime($startDateTime));
        //         $endDateTime = date('Y-m-d 23:59:59', strtotime($endDateTime));
    
        //         $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
        //     }
        // });
    });



    
      
        $grid->actions(function ($actions) {
            $actions->add(new editing);
        });
        
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
        $show->field('amount', __('amount'));
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

          
      

       return route('aman');
    }
}

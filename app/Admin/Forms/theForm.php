<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\customTable;
use Illuminate\Support\Facades\Route;

class theForm extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'Fill your details';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        $value=new customTable();
        $value->name=$request->name;
        $value->email=$request->email;
        $value->token=$request->token;

        $value->save();

        

        admin_success('Processed successfully.');

        return redirect()->back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
         $data= @csrf_token();
      
        $this->text('name')->rules('required');
        $this->email('email')->rules('email')->rules('required');
        $this->hidden('token')->default($data);

      
       
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    // public function data()
    // {
    //     return [
    //         'name'       => 'John Doe',
    //         'email'      => 'John.Doe@gmail.com',
    //         'created_at' => now(),
    //     ];
    // }
}

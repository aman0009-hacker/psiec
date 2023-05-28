<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\customTable;

class custom extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
      
    $data=$request->all();
        customTable::create($data);
        

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form($id)
    {


        $this->text('name')->default('name');
        $this->email('email')->default('email');
       
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

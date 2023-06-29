<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

use App\Notifications\theEmail;
class userEmail extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'user';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        
         $data=user::all();
      
     
         

      $senddata=[
        "greeting"=>$request->greeting,
        "message"=>$request->message,
        "button"=>$request->button,
        "link"=>$request->link,
        "regards"=>$request->regards
      ]    ;

      Notification::send($data,new theEmail($senddata));
        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('greeting')->rules('required');
        $this->text('message')->rules('required');
        $this->text('button')->default('button')->rules('required');
        $this->text('link')->rules('required');
        $this->text('regards')->rules('required');
        $this->datetime('created_at');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'name'       => 'John Doe',
            'email'      => 'John.Doe@gmail.com',
            'created_at' => now(),
        ];  
    }
}

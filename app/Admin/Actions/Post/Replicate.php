<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf;
class Replicate extends RowAction
{
    public $name = 'pdf';

    public function handle(Model $model)
    {
       
        // $pdf = PDF::loadView('data', compact('model'));
        // return $pdf->stream('whateveryourviewname.pdf');
    
       

       
    }
    public function href()
    {
        return '/form';
    }

}
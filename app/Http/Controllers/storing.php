<?php

namespace App\Http\Controllers;

use App\Admin\Controllers\supervisorController;
use App\Models\product;
use App\Models\yardsupervisor;
use Illuminate\Http\Request;
use Encore\Admin\Layout\Content;

class storing extends Controller
{
public function view(Content $content)
{
    $data=product::all();
   return $content
   ->body(view('addingsubtracting',compact('data')));
}
    public function maindata(request $request)
    {
       $pro= $request->product;
       $qua=$request->quantity;
       $amo=$request->amount;
       $date=$request->date;
       $num=0;
       foreach($pro as $product)
       {
        
           $data= new yardsupervisor();
           $data->date=$date[$num];
           $data->product=$pro[$num];
           $data->quantity=$qua[$num];
           $data->amount=$amo[$num];
           $data->notes=$request->note;
           $data->save();
           $num++;
        }
        return redirect('admin/yardsupervisors');
    }
    public function more(Content $content,$id)
    {
       $money= yardsupervisor::find($id);
      
        $data=product::all();
        return $content
        ->body(view('addingsubtracting',['data'=>$data,'money'=>$money]));
    }
}

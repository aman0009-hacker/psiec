<?php

namespace App\Http\Controllers;
use App\Models\dummy;
use App\Models\firstTable;
use App\Models\thirdTable;
use Illuminate\Http\Request;
use App\Models\secondTable;
class first extends Controller
{
    public function first(Request $req)
    {
      $data= new firstTable();
      $data->name=$req->nam;
      $data->save();
      return redirect()->back()->with("message","The data is successfully uploaded");
    }
    public function second(Request $req)

    {
$data2=new secondTable();
$data2->name=$req->head;
$data2->firstTable_id=$req->num;

$data2->save();
return redirect()->back()->with('message','the data is successfully uploaded');

    }
    public function relate()
    {
        $data=firstTable::all();
        return view('dependentMenu',compact('data'));
    }
    public function store(Request $req)
    {
        $data=new thirdTable();
        $data->first=$req->data;
        $data->second=$req->cat;
        $data->name=$req->header;
        $image=$req->num;
        $imageName=time().".".$image->getClientOriginalExtension();
        $req->num->move('pro',$imageName);
        $data->image=$imageName;
        $data->save();
        return redirect()->back()->with('message','uploaded');
    }
    public function theajax(Request $request)
    {
        $data=dummy::select('name')->where('name','LIKE',"%$request->value%")->get();
        return response()->json($data);
    }
}

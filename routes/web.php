<?php

use App\Admin\Actions\Post\article;
use App\Http\Controllers\excelController;
use App\Http\Controllers\storing;
use App\Http\Controllers\testing;
use App\Models\firstTable;
use App\Models\secondTable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\thePdf;
use App\Http\Controllers\userController;
use App\Http\Controllers\theResource;
use App\Http\Controllers\customTable;
use App\Http\Controllers\customtt;
use App\Models\User;
use App\Http\Controllers\first;
use App\Models\yardsupervisor;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('pdf/{data}',function($val)
{
$data=Pdf::loadView('data');
return $data->download('admin.pdf');
}
);


    // Route::resource('form',theResource::class);
    Route::get('form',[userController::class,'setting']);

    Route::get("admin/customTable/{data}/edit",[customtt::class,'custom']);

    Route::get('admin/email/{email}',function($email)
    {
       
      
        $data=User::all();
      foreach($data as $value)
      {
      
        if($value->email==$email)
        {
            return view('checkEmail');
           
        }

      }
      return "Data";
     
    
    });

    Route::view('first','firsttable');
    Route::post('thefirst',[first::class,'first'])->name('first');
    Route::view('second','second');
    Route::post('thesecond',[first::class,'second'])->name('second');

    Route::get('relation',function()
    {
     $data= firstTable::with('made')->get();
     return dd($data);
    });


    Route::get('therelate',[first::class,'relate']);
    Route::get('getCourse/{data}',function($data)
    {
       $main=secondTable::where('firstTable_id','=',$data)->get();
      return $main;
    });
    Route::post('store',[first::class,'store'])->name('submitdata');
    Route::get('theajax',[first::class,'theajax'])->name('typemain');
    Route::view('ahead', 'typeahead');


    Route::get('admin/alldatas/api/maindata',[testing::class,'main']);
    Route::get('admin/alldatas/api/mainsub',[testing::class,'mainsub']);

    Route::get('admin/alldatas/{data}/api/maindata',[testing::class,'mainsubmain']);
    Route::get('admin/alldatas/{data}/api/mainsub',[testing::class,'maintask']);

    // Route::post('makeit',[function(request $request)
    // {
    //   $data=new yardsupervisor();
    //   $data->product=$request->product;
    //   $data->notes=$request->notes;
    //   $data->supervisor_id=$request->supervisor_id;
    //   $data->quantity=$request->quantity;
    //   $data->save();
    //   return redirect()->back();
    // });
   Route::get('admin/yardsupervisors/create',[storing::class,'view']);
    Route::post('maindata',[storing::class,'mainData'])->name('storeData');
    Route::get('admin/edit/{data}',[storing::class,'more']);


    Route::get('excel',[excelController::class,'excelData']);
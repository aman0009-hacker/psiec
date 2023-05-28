<?php

use App\Admin\Actions\Post\article;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\thePdf;
use App\Http\Controllers\userController;
use App\Http\Controllers\theResource;
use App\Http\Controllers\customTable;
use App\Http\Controllers\customtt;



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



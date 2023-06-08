<?php

namespace App\Http\Controllers;

use App\Models\belowdata;
use App\Models\datasub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testing extends Controller
{
    //

public function main(Request $request)
{
    $provinceId = $request->get('q');

    return belowdata::where('maindata_id', $provinceId)->get(['id', DB::raw('title as text')]);
}
public function mainsubmain(Request $request)
{
    $provinceId = $request->get('q');

    return belowdata::where('maindata_id', $provinceId)->get(['id', DB::raw('title as text')]);
}
public function mainsub(Request $request)
{
    $provinceId = $request->get('q');

    return datasub::where('belowdata_id', $provinceId)->get(['id', DB::raw('title as text')]);
}
public function maintask(Request $request)
{
    $provinceId = $request->get('q');

    return datasub::where('belowdata_id', $provinceId)->get(['id', DB::raw('title as text')]);
}
}

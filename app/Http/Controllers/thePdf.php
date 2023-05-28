<?php

namespace App\Http\Controllers;

use App\Admin\Actions\Post\article;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class thePdf extends Controller
{
    public function pdf($data)
    {
        $main=article::find($data);
        $pdf=PDF::loadView('data');
        return $pdf->download('apple.pdf');
    }
}

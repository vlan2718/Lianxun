<?php

namespace App\Http\Controllers\Test;

use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Barryvdh\DomPDF\PDF;
use \Barryvdh\DomPDF\ServiceProvider;
use App;

class MakePdfController extends Controller
{
    //生成pdf
    public function MakePdf(){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('welcome'));
        return $pdf->stream();
    }
}

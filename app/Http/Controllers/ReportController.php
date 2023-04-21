<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
class ReportController extends Controller
{
    //PDF 
    public function viewPDF(){

        $pdf = PDF::loadHTML('pdf.pdf-view-profile', $data)
        ->setPaper('a4', 'portrait');

        return $pdf->stream();
    }
}

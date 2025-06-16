<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function showFinancialReport()
    {
        return view('pages.laporan-keuangan');
    }
}

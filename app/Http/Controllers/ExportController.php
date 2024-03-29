<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}

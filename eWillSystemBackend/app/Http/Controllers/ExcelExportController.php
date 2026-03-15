<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport; 
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class ExcelExportController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new UserExport, date("dmy").'Subscribers.xlsx');
    }
}

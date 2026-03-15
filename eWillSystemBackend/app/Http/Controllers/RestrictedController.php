<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestrictedController extends Controller
{
    public function index()
    {
        return view("restricted");
    }
}

<?php

namespace App\Http\Controllers\Reporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
}

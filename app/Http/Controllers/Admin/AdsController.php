<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    //

    public function index()
    {
        return view('admin.adsManagement.index');
    }
    public function add()
    {
        return view('admin.adsManagement.add');
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        return view('admin.adsManagement.edit',compact('ad'));
    }
}

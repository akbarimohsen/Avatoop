<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggest;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class SuggestionController extends Controller
{
    //

    public function index()
    {
        return view('admin.suggestsManagement.index');
    }

    public function show($id)
    {
        $suggest = Suggest::find($id);
        return view('admin.suggestsManagement.show',compact("suggest"));
    }
}

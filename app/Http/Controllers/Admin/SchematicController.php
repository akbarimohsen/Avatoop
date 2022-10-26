<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schematic;
use Illuminate\Http\Request;

class SchematicController extends Controller
{

    public function index()
    {
        $schematic =Schematic::latest()->all();
        return view('admin.schematic.index',compact('schematic'));
    }


    public function create()
    {
        return view('admin.schematic.create');
    }

    public function store(Request $request)
    {
        //
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

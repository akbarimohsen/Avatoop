<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSchematicRequest;
use App\Models\Schematic;
use Illuminate\Http\Request;

class SchematicController extends Controller
{

    public function index()
    {
        $schematics = Schematic::all();
        return view('admin.schematic.index', compact('schematics'));
    }


    public function create()
    {
        return view('admin.schematic.create');
    }

    public function store(CreateSchematicRequest $request)
    {
        $exist = Schematic::where('schematic', $request->schematic)->first();
        if (!$exist) {
            Schematic::create([
                'schematic' => $request->schematic
            ]);
            session()->flash('create', 'شماتیک با موفقیت ایجاد شد');
            return redirect()->route('schematic.index');
        } else {
            session()->flash('exist', 'شماتیک مورد نظر موجود است');
            return redirect()->route('schematic.create');
        }
    }


    public function edit($id)
    {
        $schematic= Schematic::findOrFail($id);
        return view('admin.schematic.edit', compact('schematic'));
    }


    public function update(CreateSchematicRequest $request, $id)
    {
        Schematic::findOrFail($id)->update([
            "schematic" => $request->schematic
        ]);
        session()->flash('update', 'آیتم مورد نظر با موفقیت آپدیت شد');
        return redirect()->route('schematic.index');
    }


    public function destroy($id)
    {
        Schematic::where('id', $id)->delete();
        session()->flash('delete', 'شماتیک مورد نظر با موفقیت حذف شد');
        return redirect()->route('schematic.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::all();
        return view('admin.create-permission.create',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-permission.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $exist=Permission::where('name',$request->permission)->first();
        if (!$exist){
            Permission::create([
                'name' => $request->permission
            ]);
            session()->flash('create','سطح دسترسی مورد نظر ایجاد شد');
            return redirect()->route('permission.index');
        }else{
            session()->flash('exist','سطح دسترسی مورد نظر موجود است');
            return redirect()->route('permission.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission=Permission::findOrFail($id);
        return view('admin.create-permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePermissionRequest $request, $id)
    {
        Permission::findOrFail($id)->update([
            "name"=>$request->permission
        ]);
        session()->flash('update','آیتم مورد نظر با موفقیت آپدیت شد');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            Permission::destroy($id);
            session()->flash('delete','سطح دسترسی مورد نظر با موفقیت حذف شد');
            return redirect()->route('permission.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\createRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return view('admin.create-role.create',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRole $request)
    {
        $exist=Role::where('name',$request->role)->first();
        if (!$exist){
            Role::create([
                'name' => $request->role
            ]);
            session()->flash('create','نقش مورد نظر ایجاد شد');
            return redirect()->route('role.index');
        }else{
            session()->flash('exist','نقش مورد نظر موجود است');
            return redirect()->route('role.index');
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
        $role=Role::findOrFail($id);
        return view('admin.create-role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createRole $request,$id)
    {
        Role::findOrFail($id)->update([
            "name"=>$request->role
        ]);
        session()->flash('update','آیتم مورد نظر با موفقیت آپدیت شد');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        session()->flash('delete','نقش مورد نظر با موفقیت حذف شد');
        return redirect()->route('role.index');
    }
}

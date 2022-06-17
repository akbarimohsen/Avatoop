<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\createRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create()
    {
        $roles=Role::all();
        return view('admin.create-role.create',compact('roles'));
    }

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

    public function edit($id)
    {
        $role=Role::findOrFail($id);
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.create-role.edit',compact('role','permissions'));
    }

    public function update(createRole $request,$id)
    {
        Role::findOrFail($id)->update([
            "name"=>$request->role
        ]);
        session()->flash('update','آیتم مورد نظر با موفقیت آپدیت شد');
        return redirect()->route('role.create');
    }

    public function givePermission(Request $request,Role $role)
    {
        $permission=Permission::findOrFail($request->permission);
        if ($role->hasPermissionTo($permission->name)){
            session()->flash('exist','قبلا این permission به این نقش داده شده');
            return redirect()->route('role.create');
        }else{
            $role->givePermissionTo($permission->name);
            session()->flash('create','عملیات با موفقیت انجام شد');
            return redirect()->route('role.create');
        }
    }
    public function revokePermission(Role $role,Permission $permission)
    {
        if ($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            session()->flash('create','عملیات با موفقیت انجام شد');
            return redirect()->route('role.create');
        }else{
            session()->flash('exist','این permission وجود ندارد');
            return redirect()->route('role.create');
        }
    }
    public function destroy($id)
    {
        Role::destroy($id);
        session()->flash('delete','نقش مورد نظر با موفقیت حذف شد');
        return redirect()->route('role.create');
    }
}

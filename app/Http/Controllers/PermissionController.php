<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.create-permission.create', compact('permissions'));

    }

    public function store(CreatePermissionRequest $request)
    {
        $exist = Permission::where('name', $request->permission)->first();
        if (!$exist) {
            Permission::create([
                'name' => $request->permission
            ]);
            session()->flash('create', 'سطح دسترسی مورد نظر ایجاد شد');
            return redirect()->route('permission.create');
        } else {
            session()->flash('exist', 'سطح دسترسی مورد نظر موجود است');
            return redirect()->route('permission.create');
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.create-permission.edit', compact('permission'));
    }

    public function update(CreatePermissionRequest $request, $id)
    {
        Permission::findOrFail($id)->update([
            "name" => $request->permission
        ]);
        session()->flash('update', 'آیتم مورد نظر با موفقیت آپدیت شد');
        return redirect()->route('permission.create');
    }

    public function destroy($id)
    {

        Permission::destroy($id);
        session()->flash('delete', 'سطح دسترسی مورد نظر با موفقیت حذف شد');
        return redirect()->route('permission.create');
    }
}

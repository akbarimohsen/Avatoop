<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminCreateUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
//        $permissions=Permission::all()->pluck('name','id');
        return view('admin.create-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $role = Role::where('name', $request->select_role)->first();
        if ($role == null) {
            session()->flash('exist', 'نقش مورد نظر موجود نیست');
            return redirect()->route('user.create');

        } else {
            if ($request->has('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('images/user/profile', $imageName, 'public');
            }

            $user = User::create([

                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "user_name" => $request->user_name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "password" => Hash::make($request->password),
                "profile_photo_path" => $imageName,

            ]);
            $user->assignRole($request->select_role);
            session()->flash('create', 'کاربر با موفقیت ایجاد شد');
            return redirect()->route('user.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

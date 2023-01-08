<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class  AdminCreateUser extends Controller
{

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        //$permissions=Permission::all()->pluck('name','id');
        // return response()->json([
        //     'role' => $roles
        // ]);
        return view('admin.user.create', compact('roles'));
    }


    public function store(CreateUserRequest $request)
    {
        $role = Role::where('id', $request->select_role)->first();
        if ($role==null) {
            session()->flash('exist', 'نقش مورد نظر موجود نیست');
            return redirect()->route('user.create');

        } else {
//            if ($request->has('image')) {
//                $imageName = time() .  $request->file('image')->getClientOriginalName();
//                $request->file('image')->storeAs('images/user/profile/', $imageName);
//            }
           if(Role::where('id', $request->select_role)->exists()){
            // return 'ok';
            $user = User::create([
                "username" => $request->username,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "password" => Hash::make($request->password),
            ]);
            $user->assignRole($request->select_role);
            // return response()->json([
            //     'user' => $user
            // ]);
           }

            session()->flash('create', 'کاربر با موفقیت ایجاد شد');
            return redirect()->route('user.create');

        }
    }

    public function edit($id)
    {
        $roles = Role::all()->pluck('name', 'id');

        $user=User::findOrFail($id);
        return view('admin.user.edit',compact('user','roles'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'username' =>'required|regex:/[آ-ی,a-z,A-Z]/',
            'email' =>['required','email',Rule::unique('users')->ignore($request->id)],
            'phone_number' =>['required','regex:/(09)[0-9]{9}/','digits:11','numeric',Rule::unique('users')->ignore($request->id)]
        ],[
            'username.required'=>'نام رو وارد کن',
            "username.regex" => "فیلد نام باید حروف باشد",
            "email.required" => "فیلد ایمیل باید وارد شو",
            "email.email" => "فرمت وارد شده برای ایمیل صحیح نیست",
            "email.unique" => "کاربر با این ایمیل قبلا ثبت نام کرده است",
            "phone_number.required" => "فیلد شماره تلفن اجباری است",
            "phone_number.regex" => "فرمت شماره تلفن صحیح نمیباشد و حتما باید ار اپراتور های ایران باشد",
            "phone_number.digits" => "شماره تلفن باید 11 رقم باشد",
            "phone_number.numeric" => "شماره تلفن باید عدد باشد",
            "phone_number.unique" => "این شماره تلفن قبلا ثب شده است",
        ]);
        $file=$request->file('image');
        $user=User::findOrFail($id);
//        $image='';
//        if (!empty($file)){
//            if (Storage::disk('public')->exists(env("FILE_ROOT")."images/user/profile/".$user->profile_photo_path)){
//                Storage::disk('public')->delete(env("FILE_ROOT")."images/user/profile/".$user->profile_photo_path);
//            }
//            $image=time().$file->getClientOriginalName();
//            $file->storeAs('images/user/profile/',$image);
//
//        }else{
//            $image=$user->profile_photo_path;
//        }
        $role = Role::where('id', $request->select_role)->first();
        if ($role==null) {
            session()->flash('exist', 'نقش مورد نظر موجود نیست');
            return redirect()->route('user.create');

        } else {
            $userUpdate = User::findOrFail($id)->update([
                "username" => $request->username,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "password" => Hash::make($request->password),
            ]);
            if ($userUpdate) {
                DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                $user->assignRole($request->select_role);
                session()->flash('update', 'کاربر با موفقیت آپدیت شد');
                return redirect()->route('user.index');
            } else {
                session()->flash('notUpdate', 'کاربر آپدیت نشد');
                return redirect()->route('user.index');
            }
        }
    }

    public function destroy($id)
    {
//       $user=User::findOrFail($id);
//        if (Storage::exists("images/user/profile/".$user->profile_photo_path)){
//            Storage::delete("images/user/profile/".$user->profile_photo_path);
//        }
        User::destroy($id);
        session()->flash('delete','کاربر با موفقیت حذف شد');
        return redirect()->route('user.index');
    }
}

<?php

namespace App\Http\Livewire\Admin\UserManagement;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class UsersTable extends Component
{
    use WithFileUploads;
    public function render()
    {
        $Roles=Role::all();
        return view('livewire.admin.user-management.index',['Roles'=>$Roles]);
    }
}

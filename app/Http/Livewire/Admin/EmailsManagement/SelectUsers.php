<?php

namespace App\Http\Livewire\Admin\EmailsManagement;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SelectUsers extends Component
{

    public $selectedUsers = [];
    public $SelectAll = false;
    public $name;

    public function searchUser()
    {
        $data = $this->validate([
            'name' => 'required|string'
        ]);

        $this->name = $data['name'];
    }

    public function updatedSelectAll()
    {
        if( $this->SelectAll == true ){
            $this->selectedUsers = User::role("user")->pluck('id');
        }else{
            $this->selectedUsers = [];
        }
    }


    public function render()
    {
        if($this->name == null){
            $users = User::role('user')->get();

        }else{
            $users = User::role('user')->where('username', 'like', "%$this->name%")->get();
        }
        return view('livewire.admin.emails-management.select-users',[
            'users' => $users
        ]);
    }
}

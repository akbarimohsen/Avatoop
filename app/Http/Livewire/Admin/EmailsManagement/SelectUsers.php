<?php

namespace App\Http\Livewire\Admin\EmailsManagement;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SelectUsers extends Component
{

    public $selectedUsers = [];
    public $SelectAll = false;

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
        $users = User::role('user')->get();
        return view('livewire.admin.emails-management.select-users',[
            'users' => $users
        ]);
    }
}

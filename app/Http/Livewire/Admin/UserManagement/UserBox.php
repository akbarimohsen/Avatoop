<?php

namespace App\Http\Livewire\Admin\UserManagement;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserBox extends Component
{
    use WithPagination;
    public Role $myRole;
    protected $paginationTheme = 'bootstrap';
    public $searchInput;
    protected $queryString = ['searchInput'];
    public function updatingSearchInput(): void
    {
        $this->gotoPage(1);
    }
    public function render()
    {
        $role=$this->myRole->name;
        if ($this->searchInput==null){
   $users=User::role($role)->latest()->paginate(27);
        }else{
            $users=User::role($role)->where(function ($query){
                $query->where('username','LIKE',"%{$this->searchInput}%")->orWhere(function ($query){
                    $query->where('email','LIKE',"%{$this->searchInput}%");
                });

            })->latest()->paginate(27);

        }
        return view('livewire.admin.user-management.user-box',['users'=>$users]);
    }
}

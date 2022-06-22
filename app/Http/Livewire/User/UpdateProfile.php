<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateProfile extends Component
{

    public $user;
    public $first_name;
    public $last_name;
    public $user_name;
    public $email;
    public $phone_number;


    public function mount($id)
    {
        $this->user = User::find($id);
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->user_name = $this->user->user_name;
        $this->email = $this->user->email;
        $this->phone_number = $this->user->phone_number;

    }
    public function submit()
    {
        $data = $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'user_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => [
                'required',
                'regex:/(09)[0-9]{9}/',
                'digits:11',
                'numeric',
                Rule::unique('users')->ignore($this->user->id, 'id')
            ]
        ]);

        $user = User::find($this->user->id);

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->user_name = $data['user_name'];
        $user->email = $data['email'];
        $user->phone_number = $data['phone_number'];

        $user->save();

        session()->flash('message', 'اطلاعات کاربر با موفقیت بروزرسانی شد.');

        return redirect()->route('user.profile');
    }
    public function render()
    {
        return view('livewire.user.update-profile');
    }
}

<?php

namespace App\Http\Livewire\Admin\SuggestManagement;

use App\Models\Suggest;
use Livewire\Component;

class ResponseSuggest extends Component
{
    public $response;
    public $suggest;


    public function mount($id)
    {
        $this->suggest = Suggest::find($id);
    }

    public function sendResponse()
    {
        $data = $this->validate([
            'response' => 'required|string'
        ]);

        $suggest = Suggest::find($this->suggest->id);

        $suggest->response = $data['response'];

        $suggest->save();

        session()->flash('message','پاسخ شما با موفقیت به ایمیل فرستنده پیشنهاد ارسال شد.');
        return redirect()->route('admin.suggests');
    }
    public function render()
    {
        return view('livewire.admin.suggest-management.response-suggest');
    }
}

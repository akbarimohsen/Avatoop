<?php

namespace App\Http\Livewire\Admin\SuggestManagement;

use App\Models\Suggest;
use Livewire\Component;
use Livewire\WithPagination;

class SuggestTable extends Component
{
    use WithPagination;



    public function accept($id)
    {
        $suggest = Suggest::find($id);
        $suggest->status = 1;
        $suggest->save();
        session()->flash('message', 'پیشنهاد تایید گردید.');
    }

    public function reject($id)
    {
        $suggest = Suggest::find($id);
        $suggest->status = -1;
        $suggest->save();
        session()->flash('message', 'پیشنهاد رد گردید.');
    }

    public function render()
    {
        $suggests = Suggest::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.suggest-management.suggest-table',[
            'suggests' => $suggests
        ]);
    }
}

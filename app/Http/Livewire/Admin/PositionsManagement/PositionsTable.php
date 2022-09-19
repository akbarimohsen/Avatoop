<?php

namespace App\Http\Livewire\Admin\PositionsManagement;

use App\Models\Position;
use Livewire\Component;

class PositionsTable extends Component
{

    public $name;

    protected $messages = [
        'name.required' => 'فیلد عنوان ضروری می باشد.'

    ];

    public function delete($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        session()->flash('message', 'پست بازی با موفقیت حذف گردید.');
    }

    public function addPosition()
    {
        $data = $this->validate([
            'name' => 'required|string'
        ]);

        $position = Position::create($data);

        session()->flash('message', 'پست بازی با موفقیت ایجاد گردید.');
    }

    public function render()
    {
        $positions = Position::all();
        return view('livewire.admin.positions-management.positions-table',[
            'positions' => $positions
        ]);
    }
}

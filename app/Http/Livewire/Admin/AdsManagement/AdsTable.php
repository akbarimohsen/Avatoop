<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AdsTable extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        if(Storage::exists($ad->img)){
            Storage::delete($ad->img);
        }

        Ad::destroy($id);

    }

    public function render()
    {
        $ads = Ad::paginate(1);
        return view('livewire.admin.ads-management.ads-table',[
            'ads' => $ads
        ]);
    }
}

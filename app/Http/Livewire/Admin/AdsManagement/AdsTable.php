<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdsTable extends Component
{

    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        $dir = 'images/ads';

        if(Storage::exists($dir. '/' . $ad->img)){
            Storage::delete($dir. '/' . $ad->img);
        }

        Ad::destroy($id);

    }

    public function render()
    {
        $ads = Ad::paginate(10);
        return view('livewire.admin.ads-management.ads-table',[
            'ads' => $ads
        ]);
    }
}

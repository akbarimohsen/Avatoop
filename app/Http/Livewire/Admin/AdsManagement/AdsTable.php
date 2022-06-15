<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Livewire\Component;

class AdsTable extends Component
{


    public function delete($id)
    {

        $ad = Ad::find($id);
        $path = public_path('/assets/main/images') . '/' . $ad->img;
        unlink($path );
        $ad->delete();

    }
    public function render()
    {
        $ads = Ad::paginate(10);
        return view('livewire.admin.ads-management.ads-table',[
            'ads' => $ads
        ]);
    }
}

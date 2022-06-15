<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class EditAd extends Component
{

    public $link;
    public $cost;
    public $img;




    public function mount($id)
    {
        $ad = Ad::find($id);

        $this->link = $ad->link;
        $this->cost = $ad->cost;
        $this->img = $ad->img;

    }

    public function submit()
    {
        $data = $this->validate([
            'img' => 'mimes:png,jpg,gif',
            'link' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        $data['cost'] = intval($data['cost']);

        //add image

        dd($data);

        $img_name = time() . '.' . $this->img->extension();

        //resize Image
        $dest_path = public_path('/assets/main/images');

        $img = Image::make($this->img->path());

        $img->save($dest_path . '/' . $img_name);

        $data['img'] = $img_name;
        $data['created_at'] = Carbon::now();

        Ad::create($data);

        session()->flash('message', 'تبلیغ با موفقیت تغییر گردید.');

        return redirect()->route('admin.ads');

    }


    public function render()
    {
        return view('livewire.admin.ads-management.edit-ad');
    }
}

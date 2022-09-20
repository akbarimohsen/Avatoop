<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditAd extends Component
{

    public $link;
    public $cost;
    public $img;
    public Ad $ad;


    protected $messages = [
        'img.required' => 'فیلد عکس یا گیف ضروری می باشد.',
        'link.required' => 'فیلد لینک ضروری می باشد.',
        'cost.required' => 'فیلد هزینه ضروری می باشد.',
        'cost.numeric' => 'فیلد هزینه باید یک عدد باشد.',
        'img.mimes' => 'تنها فایل با فرمت :values قابل قبول است.'
    ];

    protected $rules = [
        'img' => 'required|mimes:png,jpg,gif',
        'link' => 'required|string',
        'cost' => 'required|numeric'
    ];

    public function mount($id)
    {
        $this->ad = Ad::find($id);

        $this->link = $this->ad->link;
        $this->cost = $this->ad->cost;
        $this->img = $this->ad->img;
    }

    public function handleImageUpload()
    {
        $dir = 'images/ads';
        $name = rand(100, 10000) . "_" . $this->img->getClientOriginalName();
        $this->img->storeAs($dir, $name);
        return $name;
    }

    public function submit()
    {
        $this->validate();
        $ad = new Ad();

        $dir = "images/ads";

        if(Storage::disk('public')->exists($dir. '/' . $ad->img)){
            Storage::disk('public')->delete($dir. '/' . $ad->img);
        }

        $ad->img = $this->handleImageUpload();
        $ad->link = $this->link;
        $ad->cost = $this->cost;
        $ad->save();

        return redirect()->route('admin.ads');
    }

    public function render()
    {
        return view('livewire.admin.ads-management.edit-ad');
    }
}

<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class AddAd extends Component
{
    use WithFileUploads;

    public $img;
    public $link;
    public $cost;
    public $created_at;

    protected $messages = [
        'img.required' => 'فیلد عکس یا گیف ضروری می باشد.',
        'link.required' => 'فیلد لینک ضروری می باشد.',
        'cost.required' => 'فیلد هزینه ضروری می باشد.',
        'cost.numeric' => 'فیلد هزینه باید یک عدد باشد.',
        'img.mimes' => 'تنها فایل با فرمت :values قابل قبول است.',
    ];

    protected $rules = [
        'img' => 'required|mimes:png,jpg,gif',
        'link' => 'required|string',
        'cost' => 'required|numeric'
    ];

    public function handleImageUpload()
    {
        $dir = 'images/ads';
        $name = rand(100, 10000) . "_" . $this->img->getClientOriginalName();
        $this->img->storeAs($dir, $name,'ftp');
        return "$dir/$name";
    }


    public function submit()
    {
        $this->validate();

        $ad = Ad::create([
            'img' => $this->handleImageUpload(),
            'link' => $this->link,
            'cost' => $this->cost,
            'created_at' => Carbon::now()
        ]);

        $ad->save();

        return redirect()->route('admin.ads');
    }

    public function render()
    {
        return view('livewire.admin.ads-management.add-ad');
    }
}

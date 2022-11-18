<?php

namespace App\Http\Livewire\Admin\AdsManagement;

use App\Models\Ad;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditAd extends Component
{
    use WithFileUploads;
    public $ad;
    public $link;
    public $cost;
    public $img;


    protected $messages = [
        'img.required' => 'فیلد عکس یا گیف ضروری می باشد.',
        'link.required' => 'فیلد لینک ضروری می باشد.',
        'cost.required' => 'فیلد هزینه ضروری می باشد.',
        'cost.numeric' => 'فیلد هزینه باید یک عدد باشد.',
        'img.mimes' => 'تنها فایل با فرمت :values قابل قبول است.'
    ];

    protected $rules = [
        'img' => 'nullable|mimes:png,jpg,gif',
        'link' => 'required|string',
        'cost' => 'required|numeric'
    ];

    public function mount($id)
    {
        $this->ad = Ad::findOrFail($id);
        $this->link = $this->ad->link;
        $this->cost = $this->ad->cost;
    }

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
        $ad = $this->ad;

        if($this->img != null){
            if(Storage::exists($ad->img)){
                Storage::delete($ad->img);
            }
            $ad->img = $this->handleImageUpload();
        }else{
            $ad->img = $this->ad->img;
        }

        $ad->link = $this->link;
        $ad->cost = $this->cost;
        $ad->created_at = Carbon::now();
        $ad->save();

        return redirect()->route('admin.ads');
    }

    public function render()
    {
        return view('livewire.admin.ads-management.edit-ad');
    }
}

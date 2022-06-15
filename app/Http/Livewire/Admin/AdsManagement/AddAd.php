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

    public function submit()
    {
        $data = $this->validate([
            'img' => 'required|mimes:png,jpg,gif',
            'link' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        $data['cost'] = intval($data['cost']);

        //add image
        $img_name = time() . '.' . $this->img->extension();

        //resize Image
        $dest_path = public_path('/assets/main/images');

        $img = Image::make($this->img->path());

        $img->save($dest_path . '/' . $img_name);

        $data['img'] = $img_name;
        $data['created_at'] = Carbon::now();

        Ad::create($data);

        session()->flash('message', 'تبلیغ با موفقیت ایجاد گردید.');

        return redirect()->route('admin.ads');

    }

    public function render()
    {
        return view('livewire.admin.ads-management.add-ad');
    }
}

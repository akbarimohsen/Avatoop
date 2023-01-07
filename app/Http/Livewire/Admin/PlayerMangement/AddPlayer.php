<?php

namespace App\Http\Livewire\Admin\PlayerMangement;

use App\Models\Nationality;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class AddPlayer extends Component
{
    use WithFileUploads;

    public $full_name;
    public $birth_date;
    public $description;
    public $team_id;
    public $nationality_id;
    public $position_id;
    public $img;

    protected $messages = [
        'full_name.required' => 'فیلد نام ضروری می باشد.',
        'birth_date.required' => 'فیلد تاریخ تولد ضروری می باشد.',
        'description.required' => 'فیلد توضیحات ضروری می باشد.',
        'team_id.required' => 'فیلد تیم ضروری می باشد.',
        'nationality_id.required' => 'فیلد ملیت ضروری می باشد',
        'position_id.required' => 'فیلد پست بازی ضروری می باشد.',
        'img.required' => 'تصویر ضروری می باشد',
        'img.image' => 'فقط فایل عکس قابل قبول است.',
        'img.mimes' => 'تنها فایل با فرمت :values قابل قبول است.'
    ];

    protected $rules = [
        'full_name' => 'required|string|unique:players',
        'birth_date' => 'required',
        'description' => 'required|string',
        'team_id' => 'required',
        'nationality_id' => 'required',
        'position_id' => 'required',
        'img' => 'required|image|mimes:png,jpg,jpeg'
    ];

    public function render()
    {

        $teams = Team::all();
        $nationalties = Nationality::all();
        $positions = Position::all();

        return view('livewire.admin.player-mangement.add-player',[
            'teams' => $teams,
            'nationalities' => $nationalties,
            'positions' => $positions
        ]);
    }
}

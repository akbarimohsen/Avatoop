<?php

namespace App\Http\Livewire\Admin\PlayerMangement;

use Livewire\Component;
use App\Models\Player;
use Intervention\Image\Facades\Image;
use App\Models\Team;
use App\Models\Nationality;
use App\Models\Position;


class EditPlayer extends Component
{
    public $player;

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

    public function mount($id)
    {
        $this->player = Player::find($id);

        $this->full_name = $this->player->full_name;
        $this->birth_date = $this->player->birth_date;
        $this->description = $this->player->description;
        $this->team_id = $this->player->team_id;
        $this->nationality_id = $this->player->nationality_id;
        $this->position_id = $this->player->position_id;
        $this->img = $this->player->img;


    }


    public function submit()
    {
        $data = $this->validate([
            'full_name' => 'required|string',
            'birth_date' => 'required|date',
            'description' => 'required|string',
            'team_id' => 'required',
            'nationality_id' => 'required',
            'position_id' => 'required'
        ]);

        $data['team_id'] = intval($data['team_id']);
        $data['nationality_id'] = intval($data['nationality_id']);
        $data['position_id'] = intval($data['position_id']);

        $player = Player::find($this->player->id);

        $player->full_name = $data['full_name'];
        $player->birth_date = $data['birth_date'];
        $player->description = $data['description'];
        $player->team_id = $data['team_id'];
        $player->nationality_id = $data['nationality_id'];
        $player->position_id = $data['position_id'];

        $player->save();

        session()->flash('message', 'اطلاعات بازیکن شما با موفقیت تغییر گردید.');

        return redirect()->route('admin.players');

    }

    public function render()
    {

        $teams = Team::all();
        $nationalties = Nationality::all();
        $positions = Position::all();

        return view('livewire.admin.player-mangement.edit-player',[
            'teams' => $teams,
            'nationalities' => $nationalties,
            'positions' => $positions
        ]);
    }
}

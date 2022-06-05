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
    public $age;
    public $description;
    public $team_id;
    public $nationality_id;
    public $position_id;
    public $img;

    public function mount($id)
    {
        $this->player = Player::find($id);

        $this->full_name = $this->player->full_name;
        $this->age = $this->player->age;
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
            'age' => 'required|numeric',
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
        $player->age = $data['age'];
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

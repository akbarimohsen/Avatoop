<?php

namespace App\Http\Livewire\Admin\PlayerMangement;

use Livewire\Component;
use App\Models\Player;
use Intervention\Image\Facades\Image;
use App\Models\Team;
use App\Models\Nationality;
use App\Models\Position;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPlayer extends Component
{
    use WithFileUploads;
    public $player;
    public $full_name;
    public $birth_date;
    public $description;
    public $team_id;
    public $nationality_id;
    public $position_ids;
    public $img;

    public function mount($id)
    {
        $this->player = Player::find($id);
        $this->full_name = $this->player->full_name;
        $this->birth_date = $this->player->birth_date;
        $this->description = $this->player->description;
        $this->team_id = $this->player->team_id;
        $this->nationality_id = $this->player->nationality_id;
    }



    public function render()
    {

        $teams = Team::all();
        $nationalties = Nationality::all();
        $positions = Position::all();
        $player_positions_ids = [];
        foreach($this->player->positions as $position)
        {
            $player_positions_ids[] = $position->id;
        }

        $temp = $this->player->birth_date;
        $birth_date_string = substr($temp,8, 2) . "/" . substr($temp,5, 2) . "/" .substr($temp, 0,4 );
        return view('livewire.admin.player-mangement.edit-player',[
            'teams' => $teams,
            'nationalities' => $nationalties,
            'positions' => $positions,
            'player_positions_ids' => $player_positions_ids,
            'birth_date_string' => $birth_date_string
        ]);
    }
}

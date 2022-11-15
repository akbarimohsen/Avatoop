<?php

namespace App\Http\Livewire\Admin\PlayerMangement;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class PlayersTable extends Component
{
    use WithPagination;

    public $team;

    //search form properties
    public $name;

    public function mount($team_id)
    {
        $this->team = Team::find($team_id);
        $this->name = null;
    }

    public function searchPlayer()
    {
        $data = $this->validate([
            'name' => 'required|string'
        ]);

        $this->name = $data['name'];

    }

    public function delete($id)
    {

        $player = Player::findOrFail($id);
        $dir = 'images/players';
        if (Storage::exists(env("FILE_ROOT").$dir. '/' . $player->img)){
            Storage::delete(env("FILE_ROOT").$dir. '/' . $player->img);
        }

        Player::destroy($id);
    }

    public function render()
    {
        if($this->team == null){
            if($this->name == null){
                $players = Player::paginate(10);
            }else{
                $players = Player::where('full_name', 'like',"%$this->name%")->paginate(10);
            }
        }else{
            if($this->name == null){
                $players = Player::where('team_id', $this->team->id)->paginate(10);
            }else{
                $players = Player::where('team_id', $this->team->id)->where('full_name', 'like', "%$this->name%")->paginate(10);
            }
        }

        return view('livewire.admin.player-mangement.players-table',[
            'players' => $players
        ]);
    }
}

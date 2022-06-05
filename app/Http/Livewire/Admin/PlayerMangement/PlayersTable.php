<?php

namespace App\Http\Livewire\Admin\PlayerMangement;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Team;



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

        $player = Player::find($id);
        $path = public_path('/assets/images/players') . '/' . $player->img;
        unlink($path );
        $player->delete();

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

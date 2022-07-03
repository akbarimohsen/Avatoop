<?php

namespace App\Http\Livewire\User\Teams;

use App\Models\League;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddPopularTeam extends Component
{
    public $league_id;
    public $team_id;

    public function submit()
    {
        $data = $this->validate([
            'league_id' => 'required',
            'team_id' => 'required'
        ]);

        $league_id = intval($data['league_id']);
        $team_id = intval($data['team_id']);

        $user = Auth::user();

        $user->popularTeams()->attach($team_id);

        session()->flash('message', 'تیم محبوب شما اضافه گردید.');

        return redirect()->route('user.popularTeams');

    }

    public function get_leagues()
    {
        $user = Auth::user();

        $leagues = [];

        $teams = $user->popularTeams;
        foreach( $teams as $team ){
            $leagues[] = $team->league_id;
        }

        return $leagues;
    }
    public function render()
    {
        $leagues = League::whereNotIn('id', $this->get_leagues())->get();
        if($this->league_id != null){
            $teams = Team::where('league_id', $this->league_id)->get();
        }else{
            $teams = null;
        }
        return view('livewire.user.teams.add-popular-team',[
            'leagues' => $leagues,
            'teams' => $teams
        ]);
    }
}

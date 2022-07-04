<?php

namespace App\Http\Livewire\Admin\TeamManagement;

use App\Models\Team;
use Livewire\Component;

class TeamsTable extends Component
{

    // search team properties
    public $title;

    // sort team properties
    public $sorting_type;

    public function delete($id)
    {
        $team = Team::find($id);

        $path = public_path('/assets/images/teams') . '/' . $team->logo;
        unlink($path);

        $team->delete();

    }


    public function sortTeams()
    {
        $data = $this->validate([
            'sorting_type' => 'required'
        ]);

        $this->sorting_type = $data['sorting_type'];
    }
    public function searchTeam()
    {
        $data = $this->validate([
            'title' => 'required|string'
        ]);

        $this->title = $data['title'];
    }

    public function render()
    {
        if($this->title == null){
            $teams = Team::all();
        }else{
            $teams = Team::where('title', 'like', "%$this->title%")->get();
        }
        return view('livewire.admin.team-management.teams-table',[
            'teams' => $teams
        ]);
    }
}

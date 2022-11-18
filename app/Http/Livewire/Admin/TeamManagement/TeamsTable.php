<?php

namespace App\Http\Livewire\Admin\TeamManagement;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TeamsTable extends Component
{

    // search team properties
    public $title;

    // sort team properties
    public $sorting_type;

    public function delete($id)
    {
//        $team = Team::find($id);
//
//        $path = public_path('/assets/images/teams') . '/' . $team->logo;
//        unlink($path);
//
//        $team->delete();
        $team=Team::findOrFail($id);
        $dir = 'images/teams';
        if (Storage::exists($team->logo)){
            Storage::delete($team->logo);
        }
        Team::destroy($id);

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

        if( $this->sorting_type == "like" ){
            $teams = Team::orderBy('likes_count','desc')->get();
        }

        return view('livewire.admin.team-management.teams-table',[
            'teams' => $teams
        ]);
    }
}

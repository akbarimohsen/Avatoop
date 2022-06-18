<?php

namespace App\Http\Livewire\Admin\TeamManagement;

use App\Models\League;
use App\Models\Team;
use Livewire\Component;

class EditTeam extends Component
{
    public $team;
    public $title;
    public $description;
    public $league_id;

    public function mount($id)
    {

        $team = Team::find($id);
        $this->team = $team;

        $this->title = $team->title;
        $this->description = $team->description;
        $this->league_id = $team->league_id;

    }

    public function submit()
    {
        $data = $this->validate([
            'title' => 'required|string',
            'league_id' => 'required',
            'description' => 'required|string'
        ]);

        $team = Team::find($this->team->id);

        $team->title = $data['title'];
        $team->league_id = intval($data['league_id']);
        $team->description = $data['description'];

        $team->save();

        session()->flash('message', 'اطلاعات تیم مورد نظر با موفقیت تغییر یافت.');

        return redirect()->route('admin.teams');

    }

    public function render()
    {
        $leagues = League::all();
        return view('livewire.admin.team-management.edit-team',[
            'leagues' => $leagues
        ]);
    }
}

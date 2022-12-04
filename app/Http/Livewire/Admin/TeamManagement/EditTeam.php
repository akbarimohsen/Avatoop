<?php

namespace App\Http\Livewire\Admin\TeamManagement;

use App\Models\League;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;


class EditTeam extends Component
{
    use WithFileUploads;
    public $team;
    public $title;
    public $description;
    public $logo;
    public $league_id;



    protected $rules = [
        'title' => 'required|string',
        'league_id' => 'required',
        'description' => 'required|string',
        'logo' => 'required|image|mimes:png,jpg,jpeg'
    ];


    public function mount($id)
    {

        $team = Team::find($id);
        $this->team = $team;

        $this->title = $team->title;
        $this->description = $team->description;
        $this->league_id = $team->league_id;

    }

    public function handleAvatarUpload()
    {
        $dir = 'images/teams';
        $name = rand(100, 10000) . "_" . $this->logo->getClientOriginalName();
        $this->logo->storeAs($dir, $name,'ftp');
        return "$dir/$name";
    }

    public function submit()
    {
        $this->validate();
        $this->team->title = $this->title;

        if($this->logo != null ){
            if(Storage::exists($this->team->logo)){
                Storage::delete($this->team->logo);
            }
            $this->team->logo = $this->handleAvatarUpload();
        }
        $this->team->league_id = $this->league_id;
        $this->team->description = $this->description;
        $this->team->save();

        return redirect()->route('admin.teams');

    }



    public function render()
    {
        $leagues = League::all();
        return view('livewire.admin.team-management.edit-team',[
            'leagues' => $leagues,
            'team' => $this->team
        ]);
    }
}

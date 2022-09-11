<?php

namespace App\Http\Livewire\Admin\TeamManagement;

use App\Models\League;
use App\Models\Team;
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
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $team = Team::find($this->team->id);

        $team->title = $data['title'];
        $team->league_id = intval($data['league_id']);
        $team->description = $data['description'];

        if($data['logo'] != null){
            $path = public_path('/assets/images/teams') . '/' . $this->team->logo;
            unlink($path);

            $logo_name = time() . '.' . $this->logo->extension();

            //resize Image
            $dest_path = public_path('/assets/images/teams');

            $logo = Image::make($this->logo->path());

            $logo->resize(370, 245 , function($constraint) {
                $constraint->aspectRatio();
            })->save($dest_path . '/' . $logo_name);

            $team->logo = $logo_name;
        }
        $team->save();

        session()->flash('message', 'اطلاعات تیم مورد نظر با موفقیت تغییر یافت.');

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

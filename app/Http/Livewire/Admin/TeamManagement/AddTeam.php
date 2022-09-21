<?php

namespace App\Http\Livewire\Admin\TeamManagement;

use App\Models\League;
use App\Models\Team;
use GuzzleHttp\Client;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class AddTeam extends Component
{
    use WithFileUploads;

    public $title;
    public $league_id;
    public $description;
    public $logo;
    public Team $team;

    public function mount()
    {
        $this->team = new Team();
    }

    protected $rules = [
        'title' => 'required|string',
        'league_id' => 'required',
        'description' => 'required|string',
        'logo' => 'required|image|mimes:png,jpg,jpeg'
    ];

    public function handleAvatarUpload()
    {
//        $year = now()->year;
//        $month = now()->month;
//        $day = now()->day;
        $dir = 'images/teams';
        $name = rand(100, 10000) . "_" . $this->logo->getClientOriginalName();
        $this->logo->storeAs($dir, $name);
        return $name;
    }


    public function submit()
    {
        $this->validate();
//        dd($this->league_id);
        $this->team->title = $this->title;
        $this->team->logo = $this->handleAvatarUpload();
        $this->team->league_id = $this->league_id;
        $this->team->description = $this->description;
        $this->team->save();

        return redirect()->route('admin.teams');

    }

//    public function submit(){
//        $data = $this->validate([
//            'title' => 'required|string',
//            'league_id' => 'required',
//            'description' => 'required|string',
//            'logo' => 'required|image|mimes:png,jpg,jpeg'
//        ]);
//
//        $logo_name = time() . '.' . $this->logo->extension();
//
//        //resize Image
//        $dest_path = public_path('/assets/images/teams');
//
//        $logo = Image::make($this->logo->path());
//
//        $logo->resize(370, 245 , function($constraint) {
//            $constraint->aspectRatio();
//        })->save($dest_path . '/' . $logo_name);
//
//        $data['logo'] = $logo_name;
//        $data['league_id'] = intval($data['league_id']);
//
//        $team = Team::create($data);
//
//        session()->flash('message', 'تیم شما با موفقیت ایجاد گردید.');
//
//        return redirect()->route('admin.teams');
//
//    }
//
    function delete($id)
    {

    }

    public function render()
    {

        $leagues = League::all();
        return view('livewire.admin.team-management.add-team', [
            'leagues' => $leagues
        ]);
    }
}

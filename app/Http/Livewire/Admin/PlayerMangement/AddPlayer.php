<?php

namespace App\Http\Livewire\Admin\PlayerMangement;

use App\Models\Nationality;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class AddPlayer extends Component
{
    use WithFileUploads;

    public $full_name;
    public $age;
    public $description;
    public $team_id;
    public $nationality_id;
    public $position_id;
    public $img;

    public function submit()
    {
        $data = $this->validate([
            'full_name' => 'required|string',
            'age' => 'required|numeric',
            'description' => 'required|string',
            'team_id' => 'required',
            'nationality_id' => 'required',
            'position_id' => 'required',
            'img' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $img_name = time() . '.' . $this->img->extension();

        //resize Image
        $dest_path = public_path('/assets/images/players');

        $img = Image::make($this->img->path());

        $img->resize(370, 245 , function($constraint) {
            $constraint->aspectRatio();
        })->save($dest_path . '/' . $img_name);

        $data['img'] = $img_name;

        $data['team_id'] = intval($data['team_id']);
        $data['nationality_id'] = intval($data['nationality_id']);
        $data['position_id'] = intval($data['position_id']);

        $player = Player::create($data);

        session()->flash('message', 'بازیکن شما با موفقیت ایجاد گردید.');

        return redirect()->route('admin.players');

    }

    public function render()
    {

        $teams = Team::all();
        $nationalties = Nationality::all();
        $positions = Position::all();

        return view('livewire.admin.player-mangement.add-player',[
            'teams' => $teams,
            'nationalities' => $nationalties,
            'positions' => $positions
        ]);
    }
}

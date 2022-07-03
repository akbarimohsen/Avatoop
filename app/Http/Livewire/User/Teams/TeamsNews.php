<?php

namespace App\Http\Livewire\User\Teams;

use App\Models\AudioNews;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TeamsNews extends Component
{
    public $teams;
    public $selectedTeam;

    public $team_id;


    public function selectTeam(){
        $data = $this->validate([
            'team_id' => 'required'
        ]);
        $this->selectedTeam = Team::find(intval($data['team_id']));

    }


    public function addToAudioList($id){
        $news_id = intval($id);

        $user = Auth::user();


        $audio_news = AudioNews::create([
            'news_id' => $news_id
        ]);

        $user->AudioNews()->attach([
            'audioNews_id' => $audio_news->id
        ]);
        session()->flash('message', 'خبر شما به لیست خبرهای صوتی اضافه گردید.');

    }


    public function mount()
    {
        $user = Auth::user();
        $this->teams = $user->popularTeams;
        $this->selectedTeam = $this->teams[0];

    }


    public function render()
    {
        return view('livewire.user.teams.teams-news');
    }
}

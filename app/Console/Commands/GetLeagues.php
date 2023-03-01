<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GetLeagues extends Command
{

    protected $signature = 'command:GetLeagues';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $array = [];

        for($i = 1; $i <= 17; $i++){
            $response = Http::get("https://api.avatoop.com/$i");
            $array[$i] = $response->body();
        }

        $jsonString = json_encode($array);

        if(Storage::disk('local')->exists('leagues.json')){
            Storage::disk('local')->delete('leagues.json');
        }

        Storage::disk('local')->put('leagues.json', $jsonString);
    }
}

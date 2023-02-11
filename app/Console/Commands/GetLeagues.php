<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GetLeagues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:GetLeagues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $array = [];

        for($i = 1; $i <= 17; $i++){
            $response = Http::get("https://api.avatoop.com/$i");
            $array[$i] = $response->body();
        }

        $jsonString = json_encode($array,JSON_PRETTY_PRINT);

        Storage::disk('local')->put('leagues.json', $jsonString);
    }
}

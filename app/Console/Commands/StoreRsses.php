<?php

namespace App\Console\Commands;

use App\Models\Admin\Rss;
use App\Models\News;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
class StoreRsses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:StoreRsses';

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
        $f = \Vedmant\FeedReader\Facades\FeedReader::read('https://www.varzesh3.com/rss/domesticfootball');
        $result = [
            'title' => $f->get_title(),
            'description' => $f->get_description(),
            'link' => $f->get_link(),
        ];

        foreach ($f->get_items(0,10) as $item) {
            $i['title'] = $item->get_title();
            $i['description'] = $item->get_description();
            $content = file_get_contents($item->get_link());
            $html = substr($content, strpos($content, '<div class="news-text">'), strpos($content, '<div class="news-footer">') - strpos($content, '<div class="news-text">'));
            $i['content'] = strip_tags($html);
            $i['news-date'] = Carbon::createFromFormat('d M Y, h:i a', $item->get_date())->format("Y-m-d H:i:s");
            $i['isInDatabase'] = $this->isNewsInDatabase([
                'title' => $item->get_title(),
                'content' => $i['content']
            ]);
            $result['items'][] = $i;
        }

        foreach($result['items'] as $item){
            if($item['isInDatabase'] == false){
                Rss::create([
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'news-date' => $item['news-date'],
                    'content' => $item['content']
                ]);
            }
        }
        unset($f);
        return 0;
    }

    public function isNewsInDatabase($item){
        $title = $item['title'];
        $content = $item['content'];

        $recentNews = News::orderBy('NewsDate', 'desc')->limit(40)->get();

        foreach($recentNews as $news){
            $temp1 = similar_text($title, $news->title, $percent1);
            $temp2 = similar_text($content, $news->body, $percent2 );

            if($percent1 > 80 || $percent2 > 70){
                return true;
            }
        }

        return false;

    }
}

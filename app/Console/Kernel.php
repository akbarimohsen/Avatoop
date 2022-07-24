<?php

namespace App\Console;

use App\Models\Admin\Rss;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('command:StoreRsses')->everyFifteenMinutes();
        $schedule->call(function (){
            $f = \Vedmant\FeedReader\Facades\FeedReader::read('https://www.varzesh3.com/rss/domesticfootball');
            $result = [
                'title' => $f->get_title(),
                'description' => $f->get_description(),
                'link' => $f->get_link(),
//        'date'=>$f->get_date()
            ];
            foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
                $i['title'] = $item->get_title();
                $i['description'] = $item->get_description();
                $i['news_date'] = $item->get_date();
                $content = file_get_contents($item->get_link());
                $html = substr($content, strpos($content, '<div class="news-text">'), strpos($content, '<div class="news-footer">') - strpos($content, '<div class="news-text">'));
                $i['content'] = strip_tags($html);
                $result['items'][] = $i;
            }
            foreach ($result['items'] as $newsItem) {
                $exist = Rss::where('title', '=', $newsItem['title'])->exists();
                if ($exist) {
                    continue;
                } else {
                    Rss::create($newsItem);
                }
            }
            unset($f);
        })->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

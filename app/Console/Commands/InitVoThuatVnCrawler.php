<?php

namespace App\Console\Commands;

use App\Models\LinkCrawl;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class InitVoThuatVnCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vothuat:init {--url=https://www.vothuat.vn/cac-mon-phai/karate-tin-lang-vo : url bắt đầu crawl}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bắt đâu lấy các link có thể crawl trang vothuat.vn';

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
     * @return mixed
     */
    public function handle()
    {
        $url     = $this->option('url');
        $client  = new Client();
        $crawler = $client->request('GET', $url);
        $crawler->filter('.td-ss-main-content')->each(function (Crawler $crawl) use ($url) {
            $last = $crawl->filter('.page-nav > a.last')->first()->text();
            for ($i = 1; $i <= $last; $i++) {
                $urlCrawl = $url . "/page/$i";
                $client1  = new Client();
                $crawler1 = $client1->request('GET', $urlCrawl);
                $crawler1->filter('.td-ss-main-content')->each(function (Crawler $crawl1) {
                    $this->crawl($crawl1);
                });
            }
        });
    }

    protected function crawl(Crawler $crawler)
    {
        $crawler->filter('.td-block-row')->each(function (Crawler $node) {
            $node->filter('.td-block-span4')->each(function (Crawler $node1) {
                $link             = $node1->filter('h3 > a')->link()->getUri();
                $title            = $node1->filter('h3 > a')->attr('title');
                $linkCrawl        = new LinkCrawl();
                $linkCrawl->title = $title;
                $linkCrawl->link  = $link;
                try {
                    $linkCrawl->save();
                    $this->info('Adding: ' . $link);
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }
            });
        });
    }
}

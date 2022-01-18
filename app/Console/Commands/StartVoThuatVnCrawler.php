<?php

namespace App\Console\Commands;

use App\Models\LinkCrawl;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class StartVoThuatVnCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vothuat:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bắt đầu crawl trang vothuat.vn';

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
        $links = LinkCrawl::whereStatus(LinkCrawl::STATUS['DEFAULT'])->take(10)->get();
        foreach ($links as $link) {
            DB::transaction(function () use ($link) {
                $this->info('Crawling ' . $link->link);
                $link->update(['status' => LinkCrawl::STATUS['CRAWLING']]);
                Artisan::call('vothuat:crawl', ['--url' => $link->link]);
                $link->update(['status' => LinkCrawl::STATUS['CRAWLED']]);
            });
        }
    }

}

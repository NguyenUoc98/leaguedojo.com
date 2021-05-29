<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Symfony\Component\DomCrawler\Crawler;

class VoThuatVnCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vothuat:crawl {--url= : url will crawl}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl a post from url vothuat.vn';

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
        $url = $this->option('url');
        $this->info('Crawling ' . $url);

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $contentPost = '';
        $title = '';
        $image = '';
        $crawler->filter('.post.type-post.status-publish')->each(function (Crawler $node) use(&$contentPost, &$title, &$image){
            $nodeHead = $node->filter('.td-post-header');
            if($nodeHead->filter('.td-post-featured-image > a > img')->getNode(0)){
                $image = $nodeHead->filter('.td-post-featured-image > a > img')->image()->getUri();
            }
            $title1 = $nodeHead->filter('.td-post-title > h1')->text();
            $nodeContent = $node->filter('.td-post-content');
            $flag = false;
            $h = $nodeContent->filter('p')->first()->nextAll()->reduce(function(Crawler $node1) use(&$flag) {
                if ($node1->text() == 'VoThuat.vn') {
                    $flag = true;
                }
                if ($node1->filter('.td-a-rec')->getNode(0)) {
                    return false;
                }
                if($flag) {
                    return false;
                } else {
                    return $node1;
                }
            });
            $content = '';
            $h->each(function (Crawler $node2) use(&$content){
                $content .= $node2->outerHtml();
            });

            $contentPost = $content;
            $title = $title1;
        });

        $path = 'posts/' . Carbon::now()->format('FY');
        $path1 = public_path('storage/') . $path;
        File::isDirectory($path1) or File::makeDirectory($path1);
        if ($image) {
            $filename = basename($image);
            $path1 .= '/' . $filename;
            $thumb = Image::make($image);
            $h = $thumb->getHeight();
            $w = $thumb->getWidth();
            if ($w * 3/4 <= $h) {
                $h = $w * 3/4;
            } else {
                $w = $h * 4/3;
            }
            $thumb->crop((int)$w, (int)$h, 0, 0)->save($path1);
        } else {
            $filename = 'post-defautl.jpeg';
        }

        $post = new Post();
        $post->title = $title;
        $post->body = $contentPost;
        $post->excerpt = Str::limit(strip_tags($contentPost), 300);
        $post->slug = Str::slug($title);
        $post->keywords = '["karate", "võ thuật"]';
        $post->source = 'Võ Trần Dojo';
        $post->status = Post::PUBLISHED;
        $post->is_crawl = Post::IS_CRAWL['YES'];
        $post->category_id = 1;
        $post->author_id = 1;
        $post->image = $image ? '["' . $path . '/' . $filename . '"]' : '[]';
        try {
            $post->save();
            $this->info('Success!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}

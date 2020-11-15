<?php

namespace App\Console\Commands;

use App\Models\Document;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenThumbDoc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'document:gen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert tài liệu sang định dạng ảnh và html';

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
        $documents = Document::whereThumbnail('thumbnail/documents/default.jpeg')->get();
        $image = new \Imagick();

        foreach ($documents as $doc) {
            echo "Generating $doc->title....\n";
            $imagePath = public_path('storage/' . json_decode($doc->file)[0]) . '[0]';
            $image->readImage($imagePath);
            $image->setImageFormat("jpeg");
            $output = 'thumbnail/' . substr(json_decode($doc->file)[0], 0, strpos(json_decode($doc->file)[0], '.')) . '.jpeg';
            Storage::disk('local')->put('public/' . $output, $image->getImageBlob());
            echo "success!$doc->title\n";
            $doc->update(['thumbnail' => $output]);
        }
        $image->clear();
        $image->destroy();
    }
}

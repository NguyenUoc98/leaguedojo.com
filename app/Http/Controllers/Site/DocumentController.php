<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\LinkCrawl;
use App\Models\Post;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Symfony\Component\DomCrawler\Crawler;

class DocumentController extends Controller
{
    protected $document;

    /**
     * Create a new controller instance.
     *
     * @param  $document
     * @return void
     */
    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->document->paginate();

        // SEO
        $meta_desc = 'Các tài liệu karate';
        $meta_keywords = 'võ thuật, tài liệu';
        $url_canonical = route('documents.index');
        $image_og = '';
        $meta_title = 'Tài liệu';
        // SEO

        return view('documents.index', compact('documents', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
    {
        $document = $this->document->whereSlug($slug)->firstOrFail();
        if ($request->has('download')) {
            return response()->download(public_path().'/storage/' . json_decode($document->file)[0]);
        }
        views($document)->delayInSession($this->minutes)->record();

        // SEO
        $meta_desc = 'tài liệu karate về ' . $document->title;
        $meta_keywords = 'võ thuật, tài liệu, ' . $document->title;
        $url_canonical = route('documents.show', $slug);
        $image_og = '';
        $meta_title = $document->title;
        // SEO

        return view('documents.show', compact('document', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    public function test()
    {
        $link = LinkCrawl::find(1)->update(['status' => LinkCrawl::STATUS['CRAWLED']]);
    }
}

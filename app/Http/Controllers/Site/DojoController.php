<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Dojo;
use Carbon\Carbon;
use TCG\Voyager\Facades\Voyager;

class DojoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dojos = Dojo::all();

        // SEO
        $meta_desc     = 'Tổng hợp các cơ sở tập luyện của hệ thống Karate League Dojo';
        $meta_keywords = 'võ thuật, cơ sở tập luyện';
        $url_canonical = route('dojos.index');
        $image_og      = '';
        $meta_title    = 'Cơ sở tập luyện';
        // SEO

        return view('dojos.index',
            compact('dojos', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $dojo       = Dojo::whereSlug($slug)->firstOrFail();
        $policy     = $dojo->tuitionPolicys()->where('date_apply', '<=', Carbon::now()->format('Y-m') . '-01')->first();
        $otherDojos = Dojo::where('slug', '<>', $slug)->get();

        // SEO
        $meta_desc     = 'cơ sở ' . $dojo->name . 'của hệ thống Karate League Dojo';
        $meta_keywords = 'võ thuật, cơ sở tập luyện, ' . $dojo->name;
        $url_canonical = route('dojos.show', $slug);
        $image_og      = Voyager::image(json_decode($dojo->image)[0]);
        $meta_title    = $dojo->name;
        // SEO

        return view('dojos.show',
            compact('dojo', 'otherDojos', 'policy', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og',
                'meta_title'));
    }
}

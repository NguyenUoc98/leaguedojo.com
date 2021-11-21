<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class PostController extends VoyagerBaseController
{
    /**
     * Get view field
     */
    public function getCloneFields(Request $request)
    {
        $id = $request->divCount;
        $varId = 'keyword_' . $id;
        return view("voyager::posts.keyword-fields", compact('id', 'varId'));
    }
}

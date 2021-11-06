<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Voyager\VoyagerBaseController;
use Illuminate\Http\Request;

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

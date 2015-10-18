<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('administrator.tags.index', compact('tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $tag->articles;

        return view('administrator.tags.show', compact('tag'));
    }
}

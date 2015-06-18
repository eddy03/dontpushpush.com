<?php

namespace App\Http\Controllers\Ext;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function articles($articles = null) {

        return view('ext.articles')
            ->with('article_title', 'Title');

    }

}

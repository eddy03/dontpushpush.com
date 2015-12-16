<?php

namespace App\Http\Controllers\Ext;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Storage;

class ArticleController extends Controller
{

    public function articles($articletitle = null) {

        if(is_null($articletitle)) {
            return redirect()->route('homepage');
        }

        //Only published and first articles
        $article = Article::Published()->where('url', $articletitle)->first(array('created_at', 'updated_at', 'filename', 'subject', 'snippet'));

        //Find the selected articles
        $article->tags;

        //Get the markdown content
        $article->content = Storage::get(Article::getMarkdownDirectory() . $article->filename);

        //Remove the article filename attributes
        unset($article->filename);

        return view('ext.articles')
            ->with('article', $article);

    }

}

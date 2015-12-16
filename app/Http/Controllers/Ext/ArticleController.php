<?php

namespace App\Http\Controllers\Ext;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Storage;

class ArticleController extends Controller
{

    public function articles($articletitle = null)
    {
        if(is_null($articletitle)) {
            return redirect()->route('homepage');
        }

        $article = Article::Published()->where('url', $articletitle)->first(array('created_at', 'updated_at', 'filename', 'subject', 'snippet', 'images'));
        $article->tags;
        $article->content = Storage::get(Article::getMarkdownDirectory() . $article->filename);

        unset($article->filename);

        return view('ext.articles')
            ->with('article', $article);
    }

}

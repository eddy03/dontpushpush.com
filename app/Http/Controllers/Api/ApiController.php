<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

use App\Article;

class ApiController extends Controller
{
    public function highlight() {

        return Article::Published()->take(4)->get();

    }

    public function articles() {

        return Article::Published()->orderBy('created_at', 'DESC')->paginate(4);
    }

    public function article($article_title) {

        $article = Article::Published()->where('url', $article_title)->first(array('created_at', 'updated_at', 'filename', 'subject'));

        //Find the selected articles
        $article->tags;

        $article->content = Storage::get(Article::getMarkdownDirectory() . $article->filename);

        unset($article->filename);

        return $article;
    }

    public function githubpush(Request $request) {

        return array($request->ref);

    }

}

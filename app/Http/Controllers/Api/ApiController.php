<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use SSH;

use App\Article;

class ApiController extends Controller
{
    /**
     * List all articles that newly release (Latest articles). Only 4 results at a time.
     *
     * @return mixed
     */
    public function highlight() {

        return Article::Published()->take(4)->get();

    }

    /**
     * List all articles. Default paging is 4.
     * todo : User can specify the total number of results, orderby and some basic query strings.
     *
     * @return mixed
     */
    public function articles() {

        return Article::Published()->orderBy('created_at', 'DESC')->paginate(4);
    }

    /**
     * Get specific articles by using specific article title
     *
     * @param $article_title
     * @return mixed
     */
    public function article($article_title) {

        //Only published and first articles
        $article = Article::Published()->where('url', $article_title)->first(array('created_at', 'updated_at', 'filename', 'subject'));

        //Find the selected articles
        $article->tags;

        //Get the markdown content
        $article->content = Storage::get(Article::getMarkdownDirectory() . $article->filename);

        //Remove the article filename attributes
        unset($article->filename);

        return $article;
    }

    /**
     * Update the source code whenever any webhook POST to the given Payload URL.
     * todo : Check the branch first. Only Master branch push event will be trigger a git pull command.
     *
     * @param Request $request
     */
    public function githubpush(Request $request) {

        SSH::run([
            'cd /www/web/dontpushpush',
            'git pull',
        ], function($line)
        {
            echo $line.PHP_EOL;
        });

    }

}

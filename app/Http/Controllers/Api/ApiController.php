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
    public function highlight()
    {
        return Article::Published()->take(4)->get();
    }

    /**
     * List all articles. Default paging is 4.
     * todo : User can specify the total number of results, orderby and some basic query strings.
     *
     * @return mixed
     */
    public function articles()
    {
        return Article::Published()->orderBy('created_at', 'DESC')->paginate(4);
    }

    /**
     * Get specific articles by using specific article title
     *
     * @param $article_title
     * @return mixed
     */
    public function article($article_title)
    {
        $article = Article::Published()->where('url', $article_title)->first(array('created_at', 'updated_at', 'filename', 'subject'));

        $article->tags;
        $article->content = Storage::get(Article::getMarkdownDirectory() . $article->filename);

        unset($article->filename);

        return $article;
    }

    /**
     * Update the source code whenever any webhook POST to the given Payload URL.
     *
     * @param Request $request
     */
    public function githubpush(Request $request)
    {
        if($request->get('ref') == 'refs/heads/master') {

            //echo shell_exec('git pull');
            echo shell_exec('echo $PWD');

//            SSH::run([
//                'cd /www/web/dontpushpush',
//                'git pull',
//            ], function($line)
//            {
//                echo $line.PHP_EOL;
//            });
        } else {
            echo 'Nothing happen.';
        }
    }

}

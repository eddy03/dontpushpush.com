<?php

namespace App\Http\Controllers\Administrator;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Just fetch all the articles
        $articles = Article::orderBy('created_at', 'DESC')->get();

        return view('administrator.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('administrator.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Save the article
        $article = new Article($request->all());
        $article->filename = $this->generate_filename();
        $article->save();

        //Save the markdown content file
        Storage::put($this->getDirectory() . $article->filename, $request->markdowneditor);

        //Save the tags
        foreach(explode(',', $request->tags) as $tag) {

            //Check first if the tag already define
            $tagModel = Tag::where('tag_name', '=', $tag)->first();

            //If not define, then create new
            if(!$tagModel) {
                $tagModel = new Tag();
                $tagModel->tag_name = $tag;
                $tagModel->save();
            }

            //Relation the tags to the article
            $article->tags()->attach($tagModel->id);
        }

        //If is publish, then go to show articles, else, go to edit page
        return ($article->is_publish)? redirect()->route('administrator.article.show', $article->id) : redirect()->route('administrator.article.edit', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Find the selected articles
        $article = Article::find($id);
        $article->tags;

        $content = Storage::get($this->getDirectory() . $article->filename);

        return view('administrator.articles.show', compact('article', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Find the selected articles
        $article = Article::find($id);
        $article->urls = urldecode($article->url);
        $article->tags;

        $content = Storage::get($this->getDirectory() . $article->filename);

        return view('administrator.articles.edit', compact('article', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //Find the to be updated articles and update it
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        //Save the markdown content file
        Storage::put($this->getDirectory() . $article->filename, $request->markdowneditor);

        //TODO : We compare the array and only remove only tag that being change rather than redo
        //Remove all previous tags
        foreach($article->tags->lists('id') as $tagId) {
            $article->tags()->detach($tagId);
        }

        //Re-Insert back the tags and relation it
        foreach(explode(',', $request->tags) as $tag) {

            //Remove all whitespace on the tag
            $tag = preg_replace('/\s+/', '', $tag);

            //Check first if the tag already define
            $tagModel = Tag::where('tag_name', '=', $tag)->first();

            //If not define, then create new
            if (!$tagModel) {
                $tagModel = new Tag();
                $tagModel->tag_name = $tag;
                $tagModel->save();
            }

            //Relation the tags back to the article
            $article->tags()->attach($tagModel->id);

        }

        //If is publish, then go to show articles, else, go to edit page
        return ($article->is_publish)? redirect()->route('administrator.article.show', $article->id) : redirect()->route('administrator.article.edit', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        //Remove all tags associated
        foreach($article->tags->lists('id') as $tagId) {
            $article->tags()->detach($tagId);
        }

        Storage::delete($this->getDirectory() . $article->filename);

        $article->delete();

        return redirect()->route('administrator.article.index');
    }

    /**
     * Generate the filename for the markdown
     *
     * @return string
     */
    private function generate_filename() {
        return str_random(40) . '_' . date('dMYhiA');
    }

    /**
     * Get the directory to keep all the markdown file
     *
     * @return string
     */
    private function getDirectory() {

        return Article::getMarkdownDirectory();
    }
}

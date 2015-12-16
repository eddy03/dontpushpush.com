<?php

namespace App\Http\Controllers\Administrator;

use App\Document;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use File;
use App\Tag;

class DashboardController extends Controller
{
    public function dashboard(Document $document) {

        $totalArticle = Article::count();

        $documentPath = $document->documentPath();
        $path = public_path() . DIRECTORY_SEPARATOR . $documentPath;
        $files = File::files($path);

        $totalTag = Tag::count();

        return view('administrator.dashboard')
            ->withTotalarticle($totalArticle)
            ->withTotaldocument(count($files))
            ->withTotaltag($totalTag);

    }

    /**
     * @return mixed
     */
    public  function logout() {

        Auth::logout();

        return redirect()->route('homepage');;

    }
}

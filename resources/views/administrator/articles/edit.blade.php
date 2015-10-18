@extends('layouts.administrator')

@section('title', 'Kemaskini artikel - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <a href="{{ route('administrator.article.create')  }}" class="btn btn-default pull-right m-l-10" data-toggle="tooltip" data-placement="left" title="Tambah artikel baru">
            <i class="fa fa-plus fa-fw"></i>
        </a>
        <a href="{{ route('administrator.article.index')  }}" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="left" title="Senarai artikel">
            <i class="fa fa-list fa-fw"></i>
        </a>
        <h2>Kemaskini Artikel</h2>
    </div>
    @include('administrator.articles.partial_article_form', ['formAction' => ['administrator.article.update', $article->id], 'method' => 'put', 'article' => $article, 'content' => $content])
@endsection

@section('script')
    <script src="{{ elixir('js/article.js') }}"></script>
@endsection
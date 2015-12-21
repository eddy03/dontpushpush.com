@extends('layouts.administrator')

@section('title', 'Cipta artikel baru - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <a href="{{ route('administrator.article.index')  }}" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="left" title="Senarai artikel">
            <i class="fa fa-list fa-fw"></i>
        </a>
        <h2>Cipta Artikel Baru</h2>
    </div>
    <!-- /.row -->
    @include('administrator.articles.partial_article_form', ['formAction' => 'administrator.article.store'])
@endsection

@section('script')
    <script src="{{ elixir('article.js') }}"></script>
@endsection
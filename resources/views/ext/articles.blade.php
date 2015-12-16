@extends('layouts.ext')

@section('meta')
    <meta name="description" content="{{ $article->snippet }}">
    <meta property="og:title" content="{{ $article->subject }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="http://www.iacquire.com/some-thumbnail.jpg"/>
    <meta property="og:description" content="{{ $article->snippet }}"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="{{ URL::current() }}">
    <meta name="twitter:title" content="{{ $article->subject }}">
    <meta name="twitter:description" content="{{ $article->snippet }}">
    <meta name="twitter:image" content="http://graphics8.nytimes.com/images/2012/02/19/us/19whitney-span/19whitney-span-articleLarge.jpg">
@endsection

@section('title', $article->subject . ' - ')

@section('style')
@endsection

@section('content')
    <textarea id="article_content_tx" style="display: none">{!! $article->content !!}</textarea>
    <div class="article_content" id="article_content"></div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#article_content').html(marked($('#article_content_tx').val()));
            $('#article_content img').addClass('img-responsive');
            Prism.highlightAll();
        });
    </script>
@endsection
@extends('layouts.administrator')

@section('title', 'Senarai Tags - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <h2>Maklumat Tag - {{ $tag->tag_name }}</h2>
    </div>

    <ul>
        @foreach($tag->articles as $article)
        <li>
            <a href="{{ route('administrator.article.show', $article->id) }}">{{ $article->subject }}</a>
        </li>
        @endforeach
    </ul>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:last').addClass('active');
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
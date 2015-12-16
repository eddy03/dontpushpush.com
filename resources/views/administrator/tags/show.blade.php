@extends('layouts.administrator')

@section('title', 'Senarai Tags - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <h2>Maklumat Tag - {{ $tag->tag_name }}</h2>
    </div>

    <div class="tag-list">
        @foreach($tag->articles as $article)
            <div class="row">
                <div class="col-sm-12">
                    <i class="fa fa-angle-double-right fa-fw"></i>
                    <a href="{{ route('administrator.article.show', $article->id) }}">{{ $article->subject }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:last').addClass('active');
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
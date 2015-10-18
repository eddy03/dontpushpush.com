@extends('layouts.administrator')

@section('title', 'Senarai artikel - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <a href="{{ route('administrator.article.create')  }}" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="left" title="Tambah artikel baru">
            <i class="fa fa-plus fa-fw"></i>
        </a>
        <h2>Senarai Artikel</h2>
    </div>

    <div class="article-list">
        @foreach($articles as $article)
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ route('administrator.article.show', $article->id)  }}">
                        <p class="lead">
                            <i class="fa fa-angle-double-right fa-fw"></i>
                            {{ $article->subject }}
                        </p>
                        <p>{{ $article->snippet }}</p>
                    </a>

                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:first').addClass('active');
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
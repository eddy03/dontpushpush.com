@extends('layouts.administrator')

@section('title', $article->subject . ' - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <a href="{{ route('administrator.article.edit', $article->id)  }}" class="btn btn-default pull-right m-l-10" data-toggle="tooltip" data-placement="left" title="Kemaskini artikel">
            <i class="fa fa-pencil fa-fw"></i>
        </a>
        <a href="{{ route('administrator.article.index')  }}" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="left" title="Senarai artikel">
            <i class="fa fa-list fa-fw"></i>
        </a>
        <h2>Papar Artikel</h2>
    </div>
    <h4>{{ $article->subject }}</h4>
    <input type="hidden" name="markdowncontent" value="{{$content}}" />
    <div id="markdown_content"></div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:first').addClass('active');
            $('#markdown_content').html(marked($('[name="markdowncontent"]').val()));
        });
    </script>
@endsection
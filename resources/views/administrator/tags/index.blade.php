@extends('layouts.administrator')

@section('title', 'Senarai Tags - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <h2>Senarai Tag</h2>
    </div>

    <div class="tag-list">
        @foreach($tags as $tag)
            <div class="row">
                <div class="col-sm-12">
                    <i class="fa fa-angle-double-right fa-fw"></i>
                    <a href="{{ route('tagdetail', $tag->id) }}">{{ $tag->tag_name }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.topnavigation li:nth-child(3)').addClass('active');
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection
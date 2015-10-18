@extends('layouts.administrator')

@section('title', 'Senarai Tags - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <h2>Senarai Tag</h2>
    </div>

    <ul>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('tagdetail', $tag->id) }}">{{ $tag->tag_name }}</a>
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
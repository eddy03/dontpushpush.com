@extends('layouts.ext')

@section('title', ' - ' . $article_title)

@section('style')
@endsection

@section('content')
    Senarai artikel
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#menu_artikel').addClass('active');

        });
    </script>
@endsection
@extends('layouts.ext')

@section('content')
    <div class="container" id="dontpushpush">

        <!-- content main homepage -->
        <div class="content">
            <div class="row highlight" style="display: none;">
                <div class="col-sm-3" v-repeat="highlight">
                    <a href="/a/@{{url}}">
                        <img class="image-responsive img-thumbnail" v-attr="src:images" />
                        <p class="text-justify">
                            @{{subject}}
                        </p>
                    </a>
                    <hr class="visible-xs" />
                </div>
            </div>

            <hr style="display: none;" />

            <div class="row">
                <div class="col-sm-9 article-list">

                    @foreach($articles as $article)
                        <div class="row articles">
                            <a href="{{ url('/a/'. $article->url) }}">
                                <div class="col-xs-2 col-sm-3 text-center">
                                    <img src="{{ $article->images }}" class="image-responsive img-thumbnail" />
                                </div>
                                <div class="col-xs-10 col-sm-9">
                                    <p class="lead">
                                        {{ $article->subject }}
                                    </p>
                                    <p class="text-justify">
                                        {{ $article->snippet }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="col-sm-3">
                    @include('ext.sidebar')
                </div>
            </div>
        </div><!-- /.content -->

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#utama').addClass('active');
        });
    </script>
@endsection
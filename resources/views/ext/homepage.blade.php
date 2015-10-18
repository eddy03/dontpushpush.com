@extends('layouts.ext')

@section('content')
    <div class="container" id="dontpushpush">

        <!-- content main homepage -->
        <div class="content" id="utama">
            <div class="row highlight" style="display: none;">
                <div class="col-sm-3" v-repeat="highlight">
                    <a href="#/a/@{{url}}">
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

                    <div class="row articles" v-repeat="articles.data">
                        <a href="#/a/@{{url}}">
                            <div class="col-xs-2 col-sm-3 text-center">
                                <img class="image-responsive img-thumbnail" v-attr="src:images" />
                            </div>
                            <div class="col-xs-10 col-sm-9">
                                <p class="lead">
                                    @{{subject}}
                                </p>
                                <p class="text-justify">
                                    @{{snippet}}
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="text-center paging-block" v-show="articles.last_page > 1">
                        <nav>
                            <ul class="pagination">
                                <li v-show="articles.current_page != 1">
                                    <a v-attr="href: articles.prev_page_url" v-on="click: paging" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li v-repeat="articles.paging" v-class="active : articles.current_page == index">
                                    <a v-on="click: paging" href="@{{ url }}" data-index="@{{ index }}">@{{ index }}</a>
                                </li>
                                <li v-show="articles.current_page != articles.last_page">
                                    <a v-attr="href: articles.next_page_url" v-on="click: paging" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div><!-- /.article-list -->
                <div class="col-sm-3">
                    @include('ext.sidebar')
                </div>
            </div>
        </div>

        <!-- content for articles -->
        <div class="content" id="article">
            <div class="article_content" id="article_content"></div>
        </div>

        <!-- content for about dontpushpush.com -->
        <div class="content" id="tentang">
            <code>In Development</code>
        </div>
@endsection
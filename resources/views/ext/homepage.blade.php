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

                    <div class="row articles" v-repeat="articles.data">
                        <a href="/a/@{{url}}">
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
        </div><!-- /.content -->

    </div>
@endsection

@section('script')
    <script>
        var dontpushpush = new Vue({
            el: '#dontpushpush',
            data: {
                highlight: [],
                articles: [],
                article: {}
            },
            ready: function() {
                $.ajax({
                    url: 'API/v1/highlight',
                    success: function(response) {
                        dontpushpush.highlight = response;
                    }
                });

                $.ajax({
                    url: 'API/v1/articles',
                    success: function(response) {

                        dontpushpush.articles = response;
                        var paging = new Array();
                        var limit = (response.last_page > 3)? 3 : response.last_page;

                        for(var index = 1; index <= limit; index++) {

                            if(response.next_page_url) {
                                var url = response.next_page_url.substring(0, response.next_page_url.length - 1) + index
                            }
                            else {
                                var url = '';
                            }

                            paging.push({
                                index: index,
                                url: url
                            });
                        }

                        dontpushpush.articles.paging = paging;
                    }
                });
            },
            methods: {
                paging: function(e) {

                    e.preventDefault();

                    if(dontpushpush.articles.current_page != e.target.text && e.target.href != undefined) {

                        $.ajax({
                            url: e.target.href,
                            success: function(response) {
                                dontpushpush.articles = response;

                                var paging = new Array();

                                //Current page more then 3 and total page more than 6
                                if(response.current_page > 3 && response.last_page > 6) {
                                    var startnumber = response.current_page - 3;
                                    var limit = response.current_page + 3;
                                    var limit = (limit > response.last_page)? response.last_page : limit;
                                }
                                else if(response.current_page <= 3 && response.last_page > 6) {
                                    var startnumber = 1;
                                    var limit = response.current_page + 3;
                                }
                                //Article page is less then 6, but our current page is more than 3
                                else if(response.current_page > 3 && response.last_page <= 6) {
                                    var startnumber = response.current_page - 3;
                                    var limit = response.last_page;
                                }
                                else if(response.current_page <= 3 && response.last_page <= 6) {
                                    var startnumber = 1;
                                    var a = response.last_page - response.current_page;
                                    var limit = (a > 3)? (response.current_page + 3) : response.last_page;
                                }
                                //Begin
                                else {
                                    var startnumber = 1;
                                    var limit = (response.last_page > 3)? 3 : response.last_page;
                                }

                                for(var index = startnumber; index <= limit; index++) {

                                    var url = (response.next_page_url)? response.next_page_url : response.prev_page_url;

                                    paging.push({
                                        index: index,
                                        url: url.substring(0, url.length - 1) + index
                                    });
                                }

                                dontpushpush.articles.paging = paging;
                            }
                        });

                    }
                }
            }
        });

        $(document).ready(function() {

            $('#utama').addClass('active');


        });
    </script>
@endsection
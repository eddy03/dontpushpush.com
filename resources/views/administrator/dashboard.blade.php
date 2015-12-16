@extends('layouts.administrator')

@section('title', 'Administrator - ')

@section('style')
@endsection

@section('content')
    <div class="page-header">
        <h2>Utama</h2>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totalarticle }}</div>
                            <div>Artikel</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href="{{ route('administrator.article.index') }}">View Details</a></span>
                        <span class="pull-right"><a href="{{ route('administrator.article.index') }}"><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-files-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totaldocument }}</div>
                            <div>Document</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href="{{ route('administrator.document.index') }}">View Details</a></span>
                        <span class="pull-right"><a href="{{ route('administrator.document.index') }}"><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tags fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $totaltag }}</div>
                            <div>Tags</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href="{{ route('listtag') }}">View Details</a></span>
                        <span class="pull-right"><a href="{{ route('listtag') }}"><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#side_menu_dashboard').addClass('active');

        });
    </script>
@endsection
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="dontpushpush.com website">
        <meta name="author" content="eddy <eddytech03@gmail.com>">
        <link rel="icon" href="favicon.ico">

        <title>@yield('title')dontpushpush.com</title>

        <!-- Main compiled stylesheet -->
        <link href="{{ elixir('css/dontpushpush.css') }}" rel="stylesheet">

        <!-- specific page stylesheet -->
        @yield('style')
        <!-- end specific page stylesheet -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">dontpushpush</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navigation">
                        <li><a href="#/">Utama</a></li>
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori <span class="caret"></span></a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">Action</a></li>--}}
                                {{--<li><a href="#">Another action</a></li>--}}
                                {{--<li><a href="#">Something else here</a></li>--}}
                                {{--<li role="separator" class="divider"></li>--}}
                                {{--<li class="dropdown-header">Nav header</li>--}}
                                {{--<li><a href="#">Separated link</a></li>--}}
                                {{--<li><a href="#">One more separated link</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <li><a href="#/tentang">Tentang</a></li>
                        <li><a href="{{ route('special.kahwin') }}">Kahwin</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" placeholder="Memulakan carian" class="form-control" disabled>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="" title="dontpushpush.com facebook page"><i class="fa fa-facebook-official fa-fw"></i></a></li>
                        <li><a href="" title="dontpushpush.com RSS Feed"><i class="fa fa-rss fa-fw"></i></a></li>
                        <li><a href="" title="dontpushpush.com API"><i class="fa fa-code fa-fw"></i></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            @yield('content')

        </div><!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ elixir('js/app.js') }}"></script>
        @yield('script')
    </body>
</html>

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
        <link href="{{ elixir('css/administrator.css') }}" rel="stylesheet">

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
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">dontpushpush</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    @include('administrator.partial_menu')
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            @yield('content')
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ elixir('js/all.js') }}"></script>
        @yield('script')
    </body>
</html>

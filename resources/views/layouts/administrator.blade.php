<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="dontpushpush.com website">
        <meta name="author" content="eddy <eddytech03@gmail.com>">
        <link rel="icon" href="/favicon.ico">

        <title>@yield('title')dontpushpush.com</title>

        <!-- Main compiled stylesheet -->
        <link href="{{ elixir('administrator.css') }}" rel="stylesheet">

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
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <span class="animated bounce">dontpushpush</span>
                    </a>
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
        <script src="{{ elixir('dontpushpush.js') }}"></script>
        <script>
            (function($) {
                $.fn.getCursorPosition = function() {
                    var input = this.get(0);
                    if (!input) return; // No (input) element found
                    if ('selectionStart' in input) {
                        // Standard-compliant browsers
                        return input.selectionStart;
                    } else if (document.selection) {
                        // IE
                        input.focus();
                        var sel = document.selection.createRange();
                        var selLen = document.selection.createRange().text.length;
                        sel.moveStart('character', -input.value.length);
                        return sel.text.length - selLen;
                    }
                }

                $.fn.selectRange = function(start, end) {
                    if(typeof end === 'undefined') {
                        end = start;
                    }
                    return this.each(function() {
                        if('selectionStart' in this) {
                            this.selectionStart = start;
                            this.selectionEnd = end;
                        } else if(this.setSelectionRange) {
                            this.setSelectionRange(start, end);
                        } else if(this.createTextRange) {
                            var range = this.createTextRange();
                            range.collapse(true);
                            range.moveEnd('character', end);
                            range.moveStart('character', start);
                            range.select();
                        }
                    });
                };
            })(jQuery);
        </script>
        @yield('script')
    </body>
</html>

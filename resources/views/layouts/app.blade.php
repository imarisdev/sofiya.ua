<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('includes.head')
    </head>
    <body class="body">
        <div class="wrapper">
            @include('includes.header')
            <div class="container">
                @yield('content')
            </div>

            <footer class="footer--main">
                @include('includes.footer')
            </footer>
        </div>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </body>
</html>
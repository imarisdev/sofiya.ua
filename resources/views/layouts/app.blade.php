<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('includes.head')
    </head>

    @include('includes.adaptive-menu')

    <div class="main-content">

        <body class="body">

            @include('includes.header')

            <div class="container">
                @yield('content')
            </div>

            <footer class="footer--main">
                @include('includes.footer')
            </footer>

            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="owl/owl-carousel.js"></script>
            <script type="text/javascript" src="js/wow.js"></script>
            <script type="text/javascript" src="js/common.js"></script>
        </body>
    </div>
</html>

<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('includes.head')
    </head>

    @include('includes.header.adaptive-menu')

    <div class="main-content">

        <body class="body">

            @section('header')
                @include('includes.header.header')
            @show

            <div class="wrapper clearfix">
                @yield('content')
            </div>

            <footer>
                @include('includes.footer')
            </footer>

            <script src="{{ elixir('js/common.js') }}"></script>
            <script src="{{ elixir('js/owl-carousel.js') }}"></script>
        </body>
    </div>
</html>

<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('includes.head')
    </head>

    @include('includes.adaptive-menu')

    <div class="main-content">

        <body class="body">

            @include('includes.header-index')

            <div class="wrapper">
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

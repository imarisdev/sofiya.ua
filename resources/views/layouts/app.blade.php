<!DOCTYPE>
<html lang="ru">
    <head>
        @include('includes.head')
    </head>

    @include('includes.header.adaptive-menu')

    <div class="main-content">

        <body class="body">

            @section('header')
                @include('includes.header.header')

                @section('call-link')
                    @include('includes.call-link')
                @show
            @show

            <!--div class="content"-->
                @yield('content')
            <!--/div-->

            <footer>
                @include('includes.footer')
            </footer>

            <script src="{{ elixir('js/common.js') }}"></script>

        </body>
    </div>
</html>

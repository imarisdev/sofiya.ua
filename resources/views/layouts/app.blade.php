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


            @if(!Request::is('kontakty'))
                <div class="cell map">
                    @include('includes.map')
                </div>
            @endif

            <footer>
                @include('includes.footer')
            </footer>

            <div class="share42init" data-path="/img/" data-image="/public/img/nullicons.png"></div>

            <script src="{{ elixir('js/common.js') }}"></script>

        </body>
    </div>
</html>

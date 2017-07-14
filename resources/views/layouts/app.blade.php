<!DOCTYPE html>

<html lang="ru">
    <head>
        @include('includes.head')
    </head>

    @include('includes.header.adaptive-menu')


    <body class="body">
        <div class="main-content">
            @section('header')
                @include('includes.header.header')

                {{--@section('call-link')
                    @include('includes.call-link')
                @show--}}
            @show

            <!--div class="content"-->
                @yield('content')
            <!--/div-->

            @if(!Request::is('kontakty'))
                <div class="cell map">
                    @include('includes.map')
                </div>
            @endif

            <div class="fixed-links">
                <a class="fb" target="_blank" href="https://www.facebook.com/sofiyacity/"><img src="/img/fixed-socials/fb.png" alt=""></a>
                <!--a class="vk" target="_blank" href="https://vk.com/sofiyacity"><img src="/img/fixed-socials/vk.png" alt=""></a-->
                <a class="inst" target="_blank" href="https://www.instagram.com/sofiyaotmartynova/"><img src="/img/fixed-socials/inst.png" alt=""></a>
                <a class="yt" target="_blank" href="https://www.youtube.com/user/SofiyaCity"><img src="/img/fixed-socials/yt.png" alt=""></a>
                <a class="gp" target="_blank" href="https://plus.google.com/u/0/+%D0%96%D0%9A%D0%A1%D0%BE%D1%84%D0%B8%D1%8F"><img src="/img/fixed-socials/gp.png" alt=""></a>
                <a class="tw" target="_blank" href="https://twitter.com/Sofiya_City"><img src="/img/fixed-socials/tw.png" alt=""></a>
            </div>

            <footer>
                @include('includes.footer')
            </footer>
            <script async src="//www.youtube.com/player_api"></script>
	        <script async src='//callbackhub.com/l/call.js'></script>
            <script async src="{{ elixir('js/common.js') }}"></script>

            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5Q4STN"
                              height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->

        </div>
    </body>
</html>

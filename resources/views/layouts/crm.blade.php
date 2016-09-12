<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('crm.includes.head')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @if(Auth::check())
                @include('crm.includes.header')
                @include('crm.includes.sidebar')
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('crm.includes.footer')
            @else
                @yield('content')
            @endif
        </div>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Scripts -->
        <script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        <script src="{{ elixir('js/crm-common.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
        @if(!empty($js))
            @foreach($js as $item)
                <script src="{{ elixir("js/$item.js") }}"></script>
            @endforeach
        @endif
        @include('crm.includes.errors')
    </body>
</html>
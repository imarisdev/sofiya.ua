<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('admin.includes.head')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @if(Auth::check())
                @include('admin.includes.header')
                @include('admin.includes.sidebar')
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('admin.includes.footer')
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
        <script src="{{ elixir('js/admin-common.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js"></script>
        @if(!empty($js))
            @foreach($js as $item)
                <script src="{{ elixir("js/$item.js") }}"></script>
            @endforeach
        @endif
        @include('admin.includes.errors')
    </body>
</html>
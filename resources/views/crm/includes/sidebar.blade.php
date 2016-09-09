<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li><a target="_blank" href="/"><i class="fa fa-dashboard"></i> Сайт</a></li>
            <li class="header">NAVIGATION</li>
            @foreach(Auth::user()->access as $access)
                <li><a href="{{ $access->link }}"><i class="fa fa-folder"></i> {{ $access->title }}</a></li>
            @endforeach
            @if (Auth::user()->hasRole('admin'))
                <li class="header">СЕРВИСЫ</li>
                <li><a href="/admin/cache/"><i class="fa fa-circle-o text-aqua"></i> <span>Cache</span></a></li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@if(!empty($breadcrumbs) && count($breadcrumbs) > 0)
    <div class="breadcrumb cell m_b-20">
        <span class="item">
             <a href="/">Главная</a>
        </span>
        @foreach($breadcrumbs as $breadcrumb)
            @if(!empty($breadcrumb['link']))
                <span class="item">
                     <a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['title'] }}</a>
                </span>
            @else
                <span class="item">{{ $breadcrumb['title'] }}</span>
            @endif
        @endforeach
    </div>
@endif

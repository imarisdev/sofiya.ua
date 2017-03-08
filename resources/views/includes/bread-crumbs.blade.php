@if(!empty($breadcrumbs) && count($breadcrumbs) > 0)
    <ul class="breadcrumb cell m_b-20" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li class="item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="/">
                <span itemprop="name">Главная</span>
                <meta itemprop="position" content="0">
            </a>
        </li>
        @foreach($breadcrumbs as $bkey => $breadcrumb)
            @if(!empty($breadcrumb['link']))
                <li class="item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                     <a itemprop="item" href="{{ $breadcrumb['link'] }}">
                         <span itemprop="name">{{ $breadcrumb['title'] }}</span>
                         <meta itemprop="position" content="{{ $bkey + 1 }}">
                     </a>
                </li>
            @else
                <li class="item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <span itemprop="name">{{ $breadcrumb['title'] }}</span>
                    <meta itemprop="position" content="{{ $bkey + 1 }}">
                </li>
            @endif
        @endforeach
    </ul>
@endif

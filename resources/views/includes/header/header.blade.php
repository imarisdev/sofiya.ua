<!-- header -->
<header class="cell header header-all" @if(isset($complex->background)) style="background-image: url('{{ Helpers::getImage($complex->background, null, '/img/main_photo.png') }}')" @endif>
    <div class="header-top">
        <div class="nav-top cell">
            <div class="white-block"></div>
            <div class="wrapper">
                <ul>
                    <li><a href="/">Главная</a></li>
                    @each('includes.header.menu-items', Helpers::renderMenu('top'), 'item')
                </ul>
            </div>

            <div class="js-phone-click phone-click fl_r">
                <span><i class="icon-phone"></i>{{ $options['phone_1'] or '' }}<i class="down"></i> </span>
                <ul class="js-phone-block phone-block" style="display: none;">
                    <li>{{ $options['phone_2'] or '' }}</li>
                    <li>{{ $options['phone_3'] or '' }}</li>
                </ul>
            </div>
        </div>



        <div class="nav-bottom cell">

            @if($current_complex)
                <div class="logo-new fl_l">
                    <img src="{{ Helpers::getImage($current_complex->image_big) }}" alt="{{ $current_complex->title }} - ЖК София" />
                </div>
                <div class="logo-new-name">{{ $current_complex->title }}</div>
            @else
                <div class="logo-new fl_l">
                    <img src="{{ Helpers::getImage($default_complex->image_big) }}" alt="{{ $default_complex->title }} - ЖК София" />
                </div>
                <div class="logo-new-name">{{ $default_complex->title }}</div>
            @endif

            <div class="wrapper">
                <ul class="menu">
                    {{--*/ $m_key = 0; /*--}}
                    @foreach(Helpers::renderMenu('head') as $item)
                        @if($m_key <= 6)
                            <li class="@if(!empty($item['child'])) parent-menu js-parent @endif">
                                {!! Helpers::makeMenuLink($item['link'], $item['title'], $current_complex) !!}
                                @if(!empty($item['child']) && count($item['child']) > 0)
                                    <ul class="js-child child-menu">
                                        @each('includes.header.menu-items', $item['child'], 'item')
                                    </ul>
                                @endif
                                {{--*/ $m_key++; /*--}}
                            </li>
                        @else
                            @if($m_key == 7)
                                <li class="parent-menu js-parent cell-md-none">
                                    <img src="/img/menu.png">
                                    <ul class="js-child child-menu">
                            @endif
                                <li>
                                    {!! Helpers::makeMenuLink($item['link'], $item['title'], $current_complex) !!}
                                </li>
                        @endif
                    @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="call-block">
                <a class="call-btn js-fancybox" href="#form-call-back">ЗАКАЗАТЬ ЗВОНОК</a>
            </div>
        </div>
    </div>

    @include('includes.header.header-form')

    <div class="global cell-sm-none">
        @include('includes.header.header-logo-block')
    </div>

    <div class="actions-block fl_r">
        @include('includes.header.prices-header-block')
    </div>

    <div class="form-watch">
        @include('includes.header.form-watch')
    </div>

</header>

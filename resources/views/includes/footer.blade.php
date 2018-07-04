<footer class="cell footer">
    <div class="wrapper">
        <div class="cell m_b-20">
            <div class="cell2 cell-lg-none logo-footer fl_l">
                <a href="#">
                    <img src="/img/footer-logo.png" alt="ЖК София">
                </a>
            </div>

            <div class="cell2 cell-xs-6 cell-lg-none ">
                @include('includes.social')
            </div>

            <div class="cell5 info-wrap cell-lg-6 cell-xs cell-xss-none">
                <div class="cell6 address cell-md m_t-15 cell-xs-6 ">
                    <div class="m_l-20 ">
                        <p class="m_b-10"><img class="m_r-10" src="/img/placeholder-for-map.png" alt="ЖК София" />НАШ АДРЕС:<br></p>
                        {!! $options['address'] or '' !!}
                    </div>
                </div>

                <div class="cell6 phone cell-md m_t-15 cell-xs-6">
                    <div class="phone-click cell">
                        <span><i class="icon-phone"></i></span>
                        <ul class="cell m_b-20">
                            <li><a href="tel:{{ $options['phone_1'] or '' }}" onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_1'] or '' }}</a></li>
                            <li><a href="tel:{{ $options['phone_2'] or '' }}" onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_2'] or '' }}</a></li>
                            <li><a href="tel:{{ $options['phone_3'] or '' }}" onclick="yaCounter27077372.reachGoal('clickPhone'); ga('send', 'event', 'clickPhone', 'click')">{{ $options['phone_3'] or '' }}</a></li>
                        </ul>
                    </div>

                    <div class="cell mail m_t-20 m_r-20 cell-xs">
                        <i class="icon-mail"></i><a href="mailto:{{ $options['footer_email'] or '' }}">{{ $options['footer_email'] or '' }}</a>
                    </div>
                </div>
            </div>
            
            <div class="cell3 cell-lg-6 cell-xs m_t-15">
                <form class="js-feedback-form" data-formtype="formF">
                    <p class="m_b-5 ">НАПИШИТЕ НАМ</p>
                    <input type="hidden" value="Форма в футере" name="place">
                    <input class="field m_b-10" type="text" name="name" placeholder="Ваше имя">
                    <input class="field m_b-10" type="text" name="phone" placeholder="Ваш телефон">
                    <textarea class="field" type="text" name="content" placeholder="Ваш комментарий"></textarea>
                    <input type="submit" class="pull-right yellow-btn" data-formtype="formF">
                </form>
            </div>
        </div>

        @if('planirovki' != Request::path())
            <div class="cell m_b-20 cell-sm-6 cell-xs">
                <p class="info fl_l cell-md-none"></p>

                <ul class="site-pages fl_r cell-md">
                    <li><a href="/planirovki/odnokomnatnye-kvartiry">Однокомнатные</a></li>
                    <li><a href="/planirovki/dvuhkomnatnye-kvartiry">Двухкомнатные</a></li>
                    <li><a href="/planirovki/trehkomnatnye-kvartiry">Трехкомнатные</a></li>
                    <li><a href="/planirovki/kvartiry-s-remontom">Квартиры с ремонтом</a></li>
                    <li><a href="/planirovki/dvuhurovnevye-kvartiry">Двухуровневые квартиры</a></li>
                </ul>
            </div>
        @endif

        <div class="cell m_b-20 cell-sm-6 cell-xs">
            <p class="info fl_l cell-md-none">© ЖК «Софія» от Мартынова, 2016</p>

            <ul class="site-pages fl_r cell-md">
                @each('includes.header.menu-items', Helpers::renderMenu('top'), 'item')
            </ul>
        </div>

        <div class="cell m_b-25 cell-sm-6 cell-xs">
            <p class="info-s fl_l cell-md-none">Создание сайта <a href="https://www.imaris.com.ua/" target="_blank"><img src="/img/imaris.png" alt="imaris"></a></p>

            <ul class="footer-nav fl_r cell-md">
                {{--*/ $m_key = 0; /*--}}
                @foreach(Helpers::renderMenu('head') as $item)
                    @if($m_key <= 6)
                        <li>
                            {!! Helpers::makeMenuLink($item['link'], $item['title'], $current_complex) !!}
                        </li>
                        {{--*/ $m_key++; /*--}}
                    @endif
                @endforeach
                <li>
                    <a href="/sitemap">Карта сайта</a>
                </li>
            </ul>
        </div>

    </div>
    @if(isset($current_complex) && $current_complex->id == 3)
        <script type="text/javascript">
            (function(d, w, s) {
                var widgetHash = '12833gcn1sej6af8g3mn', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
                gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
                var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
            })(document, window, 'script');
        </script>
    @elseif(isset($current_complex) && $current_complex->id == 5)
        <script type="text/javascript">
            (function(d, w, s) {
                var widgetHash = 'vjevjshzor1ci8ucgefh', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
                gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
                var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
            })(document, window, 'script');
        </script>
    @else
        <script type="text/javascript">
            (function(d, w, s) {
                var widgetHash = 'dyzfiw8gzl7znubmohgx', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
                gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
                var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
            })(document, window, 'script');
        </script>
    @endif
    @include('includes.call-back')
</footer>

@extends('layouts.app')

@section('content')
    <div class="wrapper clearfix">
        <h1>{{ $complex->title }}</h1>

        <div class="cell seo-text">{!! $complex->content !!}</div>

        <div class="cell9 p_r-10">
            <div class="cell type-flats m_b-20">
                @foreach($types as $tkey => $type)
                    <div class="cell4 cell-md-6 cell-xs">
                        <div class="item">
                            <i class="{{ $type['slug'] }} cell"></i>
                            <p class="text-center cell"><a href="/{{ $complex->slug }}/{{ $type['slug'] }}/">{{ $type['title'] }}</a></p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="cell blue-block-info m_b-20">
                <div class="item">Наличие и актуальные цены по телефону</div>
                <div class="item phone">+38 (044) 362-2000</div>
                <div class="item text-r"><a href="#" class="blue-btn">СВЯЗАТЬСЯ С МЕНЕДЖЕРОМ</a></div>
            </div>

            <div class="seo-text">
                <h2 class="title">Продажа квартир в Киеве - ЖК София от Мартынова</h2>

                <p>
                    Застройщик Мартынов начал возводить ЖК «София» в 2008 году. Сегодня этот комплекс включает в себя три новых пятиэтажных здания, которые введены в эксплуатацию и практически полностью заселены жильцами. Этот жилой комплекс выбирают для себя многие молодые семьи с детьми. Ведь дома расположены в экологически чистом районе. Во дворе каждого дома растут пихты, ели и липы, а газон засеян зеленой травой. Благодаря системе автоматического орошения, жильцам не нужно тратить время и силы для того чтобы ухаживать за растительностью во дворе ЖК «София». Этот комплекс может также похвастаться высоким уровнем комфорта для владельцев транспорта. Проезжая часть полностью заасфальтирована, а парковочных мест хватает для всех. Для любителей активного отдыха во дворе предусмотрена детская площадка, тренажеры и настольный теннис. Жители ЖК София от Мартынова могут не тревожиться по поводу своей безопасности. В городке круглосуточно ведётся профессиональное видеонаблюдение.
                </p>
                <p class="capitalize">
                    Жилой комплекс «София» в Киеве - максимально комфортное жилье
                </p>
                <p>
                    ЖК «София» отличается максимальным комфортом и прекрасно развитой инфраструктурой. Дома возведены с учетом всех современных норм и технологий строительства. Для большего комфорта проживания фасады зданий утеплены пенопластом шириной 12-14 см, а в самом здании работает система индивидуального отопления. В зданиях предусмотрены современные скоростные лифты. Каждая квартира оборудована надежной металлической входной дверью и двухкамерные окнами, которые прекрасно сберегают тепло.
                </p>
            </div>
        </div>

        <div class="cell3 p_l-5">
            <div class="fitness-block cell m_b-10">
                <a class="" href="#">
                    <img src="/img/martinov/fitness.png" alt="ЖК «София» фитнес клуб">
                </a>
            </div>

            <ul class="cell list-icons-martinov m_b-10">
                <li><a href="">ФОТО ЖК МАРТЫНОВ</a></li>
                <li><a href="">ВИДЕО ЖК МАРТЫНОВ</a></li>
                <li><a href="">ШКОЛА И САДИК В ЖК МАРТЫНОВ</a></li>
            </ul>

            <div class="border-list blue-header with-img cell m_b-20">
                <p class="list-header cell">ПОСЛЕДНИЕ НОВОСТИ</p>

                <div class="item cell">
                    <a href="" class="text cell m_b-15">Открыты новые спортивные объекты в ЖК София!</a>
                    <div class="fl_l">24.04.2016</div>
                    <div class="fl_r m_r-10"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">23</span></div>
                </div>

                <div class="item cell">
                    <a href="" class="text cell m_b-15">Новый сервис для жильцов ЖК «София»</a>
                    <div class="fl_l">24.04.2016</div>
                    <div class="fl_r m_r-10"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">23</span></div>
                </div>

                <div class="item cell">
                    <a href="" class="text cell m_b-15">Ждем Вас в фитнес-клубе « София Sport»</a>
                    <div class="fl_l">24.04.2016</div>
                    <div class="fl_r m_r-10"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">23</span></div>
                </div>

                <div class="item cell">
                    <a href="" class="text cell m_b-15">Поступление в продажу квартир в новом доме!</a>
                    <div class="fl_l">24.04.2016</div>
                    <div class="fl_r m_r-10"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">23</span></div>
                </div>
            </div>


            <div class="border-list yellow-header no-img cell">
                <p class="list-header cell">ПОСЛЕДНИЕ АКЦИИ</p>

                <div class="item cell">
                    <a href="" class="text cell">Рассрочка от застройщика 0%</a>
                </div>

                <div class="item cell">
                    <a href="" class="text cell">Цена на однокомнатные
                        и двухкомнатные квартиры</a>
                </div>

                <div class="item cell">
                    <a href="" class="text cell">Рассрочка от застройщика 0%</a>
                </div>

                <div class="item cell">
                    <a href="" class="text cell">Цена на однокомнатные
                        и двухкомнатные квартиры</a>
                </div>
            </div>

        </div>
    </div>

    <div class="map cell">

    </div>
@endsection
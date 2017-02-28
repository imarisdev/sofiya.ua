@if(!empty($news) && count($news) > 0)
    <!-- news -->
    <section class="news cell">
        <div class="wrapper">
            <p class="title-page">последние НОВОСТИ НАШЕГО ГОРОДКА</p>
            <div class="cell m_b-30">
                @foreach($news as $item)
                    <div class="cell3 cell-md-6 cell-xss m_b-20">
                        <div class="item cell">
                            <img src="{{ Helpers::getImage($item->image, '288x188') }}" alt="">
                            <div class="title-page">{{ $item->title }}</div>

                            <p class="text">{{ $item->description }}</p>

                            <div class="text-center"><a href="{{ $item->link() }}" class="blue-btn">читать</a></div>

                            <div class="cell info">
                                <span class="date fl_l">{{ Helpers::getDate($item->created_at, '%d.%m.%Y') }}</span>
                                <span class="watch fl_r"><i class="icon-watch"></i>ПРОСМОТРОВ: <span class="blue">{{ $item->views }}</span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end news -->
@endif
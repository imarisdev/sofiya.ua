@if(!empty($plans_list) && count($plans_list) > 0)
    <div class="cell m_b-30">
        <h2 class="text-center h2 m_t-20 m_b-20">Планировки и цены на {{ $house->street->title }}, {{ $house->number }}</h2>

        <div class="js-tabs tabs cell">
            <ul>
                @foreach($plans_list as $title => $plan)
                    <li>{{ $title }}</li>
                @endforeach
                    <li>План дома</li>
            </ul>
            <div>
                @foreach($plans_list as $title => $plan)
                    <div class="cell">
                        @include('house.table-tabs', ['info' => $plan['plans']])
                    </div>
                @endforeach
                    <div class="cell">
                        @foreach($plans_types as $tkey => $types)
                            @if(!empty($house->images_list[$tkey]))
                                <div class="cell">
                                    {{ $types }}
                                    <a href="{{ Helpers::getImage($house->images_list[$tkey]) }}" class="js-fancybox">
                                        <img src="{{ Helpers::getImage($house->images_list[$tkey], '300x260', null, 'fit') }}" alt="..." class="margin">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endif

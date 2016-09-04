<<<<<<< HEAD
<div class="cell m_b-30">
    <h2 class="text-center h2 m_t-20 m_b-20">Планировки и цены на {{ $house->street->title }}, {{ $house->number }}</h2>

    <div class="js-tabs tabs cell">
        <ul>
            @foreach($plans_list as $title => $plan)
                <li class="@if($type['slug'] == $plan['info']['slug'])active @endif">{{ $title }}</li>
            @endforeach
        </ul>
        <div class="table-wrap">
            @foreach($plans_list as $title => $plan)
                <div class="cell" style="@if($type['slug'] == $plan['info']['slug']) display: block; @else display: none; @endif">
                    @include('house.table-tabs', ['info' => $plan['plans']])
                </div>
            @endforeach
        </div>
=======
<div class="js-tabs tabs cell">
    <ul>
        @foreach($plans_list as $title => $plan)
            <li>{{ $title }}</li>
        @endforeach
    </ul>
    <div>
        @foreach($plans_list as $title => $plan)
            <div class="cell">
                @include('house.table-tabs', ['info' => $plan['plans']])
            </div>
        @endforeach
>>>>>>> cdcbfb071ae307e70231c9ad21756cb32bccb628
    </div>
</div>

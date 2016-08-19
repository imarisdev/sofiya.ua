<div class="js-tabs tabs cell">
    <ul>
        @foreach($plans_list as $title => $plan)
            <li class="@if($type['slug'] == $plan['info']['slug']) active @endif">{{ $title }}</li>
        @endforeach
    </ul>
    <div>
        @foreach($plans_list as $title => $plan)
            <div class="cell" style="@if($type['slug'] == $plan['info']['slug']) display: block; @else display: none; @endif">
                @include('house.table-tabs', ['info' => $plan['plans']])
            </div>
        @endforeach
    </div>
</div>

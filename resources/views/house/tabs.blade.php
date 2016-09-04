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
    </div>
</div>

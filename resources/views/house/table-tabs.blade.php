<div class="table table-border">
    <div class="table-row table-caption">
        <div class="table-cell">
            S общ.
        </div>
        <div class="table-cell">
            S жил.
        </div>
        <div class="table-cell">
            S кухня
        </div>
        <div class="table-cell">
            Санузел
        </div>
        <div class="table-cell">
            Балкон
        </div>
        <div class="table-cell">
            Дата сдачи
        </div>
        <div class="table-cell">
            Фото
        </div>
    </div>
    @foreach($info as $item)
        <div class="table-row">
            <div class="table-cell">{{ $item->area }}</div>
            <div class="table-cell">{{ $item->live }}</div>
            <div class="table-cell">{{ $item->kitchen }}</div>
            <div class="table-cell">{{ $bathroom_types[$item->bathroom] }}</div>
            <div class="table-cell">{{ $balcony_types[$item->balcony] }}</div>
            <div class="table-cell">{{ Helpers::completion($house->completion_at) }}</div>
            <div class="table-cell">
                <a href="/planirovki/{{ $plan['info']['slug'] }}/{{ $item->link() }}">
                    <img alt="" src="{{ Helpers::getImage($item->image, '0x70') }}" />
                </a>
            </div>
        </div>
    @endforeach

</div>

<div class="cell table-caption blue-title">{{ $complex->title or '' }}</div>
<div class="table">
    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Район:</span>
        </div>
        <div class="table-cell">Софиевская Борщаговка</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Транспорт:</span>
        </div>
        <div class="table-cell">
            <p class="bus-icons-block">{{ $house->transport }}</p>
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">До остановки:</span>
        </div>
        <div class="table-cell">
            <p class="go-icons-block">{{ $house->to_stop }}</p>
        </div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Адрес:</span>
        </div>
        <div class="table-cell">{{ $house->street->title }}, {{ $house->number }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Дата сдачи:</span>
        </div>
        <div class="table-cell">{{ Helpers::completion($house->completion_at) }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Класс жилья:</span>
        </div>
        <div class="table-cell">{{ $house_class[$house->class] }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Тип здания:</span>
        </div>
        <div class="table-cell">{{ $building_types[$house->building_type] }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Этажность:</span>
        </div>
        <div class="table-cell">{{ $house->floors }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Квартир:</span>
        </div>
        <div class="table-cell">{{ $house->flats }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Отделка:</span>
        </div>
        <div class="table-cell">{{ $house_decoration[$house->decoration] }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Паркинг:</span>
        </div>
        <div class="table-cell">{{ $house->parking }}</div>
    </div>

    <div class="table-row">
        <div class="table-cell">
            <span class="blue-title">Оплата:</span>
        </div>
        <div class="table-cell">{{ $installments[$house->is_installments] }}</div>
    </div>
</div>

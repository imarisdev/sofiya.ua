@if($search_from)
<div class="form-header">
    <div class="form-label js-form-label">ПОИСК КВАРТИР</div>

    <form action="/search" method="GET" onsubmit="yaCounter27077372.reachGoal('searhFlat'); ga('send', 'event', 'SearchFlat', 'search')">
        <div class="js-form-content form-content cell">
            <p class="m_b-5">Выберите ЖК:</p>
            {!! Form::select('complex_list', ['' => 'Все'] + $search_from['complex_list'], Request::get('complex_list', null), ['class' => 'field m_b-10']) !!}

            <p class="m_b-5">Выберите улицу:</p>
            {!! Form::select('streets', ['' => 'Все'] + $search_from['streets'], Request::get('streets', null), ['class' => 'field m_b-10']) !!}

            <p class="m_b-5">Количество комнат:</p>
            {!! Form::select('plans_type', ['' => 'Все'] + $search_from['plan_types'], Request::get('plans_type', null), ['class' => 'field m_b-10']) !!}

            <p class="m_b-5">Метраж:</p>
            <div class="cell m_b-10">
                <div class="pull-left text">
                    <span>от</span>
                </div>

                <div class="cell4">
                    <input class="field" type="text" name="area_from" value="{{ Request::get('area_from', null) }}"/>
                </div>

                <div class="cell2 text text-right">
                    <span>до</span>
                </div>

                <div class="cell4">
                    <input class="field" type="text" name="area_to" value="{{ Request::get('area_to', null) }}"/>
                </div>
            </div>

            <div class="cell m_b-10">
                <label>
                    <input class="checkbox" type="checkbox" name="is_rent" @if(Request::get('is_rent', 0)) checked @endif/>
                    Аренда
                </label>
            </div>

            <div class="cell m_b-20">
                <label>
                    <input class="checkbox" type="checkbox" name="is_decoration" @if(Request::get('is_decoration', 0)) checked @endif />
                    Квартиры с ремонтом
                </label>
            </div>

            <input class="btn" type="submit" value="ПОИСК" />
        </div>
    </form>
</div>
@endif

<div class="contacts-header js-phone-click">
    <span>Отдел продаж</span>
</div>
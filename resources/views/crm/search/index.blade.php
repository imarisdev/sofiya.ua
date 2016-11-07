@extends('layouts.crm')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::select('complex_id', ['' => '=Жилой комплекс='] + $complex, Input::get('complex_id'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::select('plans_type', ['' => '=Тип планировки='] + $plans_type, Input::get('plans_type'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                {!! Form::select('house_id', ['' => '=Выбор дома='] + $houses, Input::get('house_id'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                {!! Form::select('is_rent', ['' => '=Аренда=', 'Нет', 'Да'], Input::get('is_rent'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                {!! Form::select('status', ['' => '=Статус=', 0 => 'Свободно', 1 => 'Продано'], Input::get('status'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                <input type="number" class="form-control" id="area_from" name="area_from" placeholder="Площадь от (общ.)" value="{{ Input::get('area_from') }}"/>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <div class="form-group">
                                <input type="number" class="form-control" id="area_to" name="area_to" placeholder="Площадь до (общ.)" value="{{ Input::get('area_to') }}"/>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Найти</button>
                                <a href="/{{ Request::path() }}" class="btn btn-primary">Сбросить фильтр</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($flats) && count($flats) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Квартиры</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-font">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Секция</td>
                            <td>№ квартиры по БТИ</td>
                            <td>Этаж / Квартира</td>
                            <td>Метраж (общ.)</td>
                            <td>Метраж (общ.) по БТИ</td>
                            <td>Кол. комнат</td>
                            <td>Статус</td>
                            <td>Примечание</td>
                            <td>Дата продажи</td>
                            <td>Менеджер</td>
                            <td>Документы</td>
                            <td>Експертная</td>
                            <td>Сдача дома</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($flats as $flat)
                            <tr class="admin-tools-wrap flat-{{ $flat->id }}">
                                <td><a href="/crm/flats/{{ $flat->id }}">{{ $flat->id }}</a></td>
                                <td>{{ $flat->section }}</td>
                                <td>{{ $flat->number_bti }}</td>
                                <td>{{ $flat->floor }} / №{{ $flat->number }}</td>
                                <td>{{ $flat->area }} м<sup>2</sup></td>
                                <td>{{ $flat->area_bti }}</td>
                                <td>{{-- $plans_type[$flat->plans_type] --}} {{ $flat->rooms }}</td>
                                <td>{{ $status[$flat->status] }}</td>
                                <td width="10%">{{ $flat->comment }}</td>
                                <td>{{ Helpers::getDate($flat->sale_at, '%d.%m.%Y') }}</td>
                                <td>{{ $flat->name }}</td>
                                <td>Документы</td>
                                <td>Експертная</td>
                                <td>
                                    <a href="/sofievskaya-borshagovka/{{ $flat->houses_id }}-{{ $flat->houses_slug }}" target="_blank">{{ $flat->street_title }}, {{ $flat->houses_number }}<br> ({{ Helpers::completion($flat->completion_at, '%d.%m.%Y') }})</a>
                                </td>
                                <td><i class="fa fa-fw fa-info-circle"></i></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $flats->setPath(Request::url())->appends(Request::query())->render() !!}
            </div>
        @endif
    </section>
@endsection
@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-2">

                        </div>
                        <div class="col-xs-2">

                        </div>
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-primary">Найти</button>
                            <a href="/{{ Request::path() }}" class="btn btn-primary">Сбросить фильтр</a>
                        </div>
                        <div class="col-xs-3">
                            <a href="/admin/flats/create" class="btn btn-primary pull-right">Добавить</a>
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
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Название</td>
                            <td>Дом</td>
                            <td>Этаж</td>
                            <td>Квартира</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($flats as $flat)
                            <tr class="admin-tools-wrap flat-{{ $flat->id }}">
                                <td>{{ $flat->id }}</td>
                                <td width="30%"><a href="/admin/flats/edit/{{ $flat->id }}">{{ $flat->title }}</a></td>
                                <td width="30%">
                                    <a href="/admin/houses/edit/{{ $flat->house->id }}">{{ $flat->house->title }}</a>
                                    <br>
                                    <small class="pull-left">Улица: <a href="/admin/streets/edit/{{ $flat->house->street->id }}">{{ $flat->house->street->title }}, {{ $flat->house->number }}</a></small>
                                </td>
                                <td>{{ $flat->floor }}</td>
                                <td>{{ $flat->number }}</td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $flat->id }}" data-action="/admin/flats" data-type="flat" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
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
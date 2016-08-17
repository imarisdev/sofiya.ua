@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-2">
                            <select name="plans_type" class="form-control">
                                <option value="">Типы планировок</option>
                                @foreach($plan_types as $key => $types)
                                    <option value="{{ $key }}" @if(Input::get('plans_type') == $key) selected @endif>{{ $types }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <select name="house_id" class="form-control">
                                <option value="">Дома</option>
                                @foreach($houses as $key => $house)
                                    <option value="{{ $key }}" @if(Input::get('house_id') == $key) selected @endif>{{ $house }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-primary">Найти</button>
                            <a href="/{{ Request::path() }}" class="btn btn-primary">Сбросить фильтр</a>
                        </div>
                        <div class="col-xs-3">
                            <a href="/admin/plans/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($plans) && count($plans) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Планировки</h3>

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
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($plans as $plan)
                            <tr class="admin-tools-wrap plan-{{ $plan->id }}">
                                <td>{{ $plan->id }}</td>
                                <td width="30%"><a href="/admin/plans/edit/{{ $plan->id }}">{{ $plan->title }}</a></td>
                                <td width="30%">
                                    <a href="/admin/houses/edit/{{ $plan->house->id }}">{{ $plan->house->title }}</a>
                                    <br>
                                    <small class="pull-right">Улица: <a href="/admin/streets/edit/{{ $plan->house->street->id }}">{{ $plan->house->street->title }}, {{ $plan->house->number }}</a></small>
                                </td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $plan->id }}" data-action="/admin/plans" data-type="plan" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $plans->setPath(Request::url())->appends(Request::query())->render() !!}
            </div>
        @endif
    </section>

@endsection
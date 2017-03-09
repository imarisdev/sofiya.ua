@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-6">
                            <a href="/admin/options/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($options) && count($options) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Опции</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Название</td>
                            <td>Значение</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($options as $option)
                            <tr class="admin-tools-wrap option-{{ $option->id }}">
                                <td>{{ $option->id }}</td>
                                <td width="30%"><a href="/admin/options/edit/{{ $option->id }}">{{ $option->title }}</a></td>
                                <td width="30%">{{ $option->options_value }}</td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $option->id }}" data-action="/admin/options" data-type="option" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </section>

@endsection
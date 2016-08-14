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
                            <a href="/admin/streets/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($streets) && count($streets) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Улицы</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Название</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($streets as $street)
                            <tr class="admin-tools-wrap street-{{ $street->id }}">
                                <td>{{ $street->id }}</td>
                                <td width="30%"><a href="/admin/streets/edit/{{ $street->id }}">{{ $street->title }}</a></td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $street->id }}" data-action="/admin/streets" data-type="strets" class="btn btn-danger btn-xs js-delete-item">Удалить</a>
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
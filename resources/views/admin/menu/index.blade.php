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
                            <a href="/admin/menu/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($menu) && count($menu) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Меню</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>Позиция</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($menu as $key => $item)
                            <tr class="admin-tools-wrap menu-{{ $item }}">
                                <td><a href="/admin/menu/sort/{{ $key }}">{{ $item }}</a></td>
                                <td>
                                    <div class="admin-tools">
                                        <!--a target="_blank" href="#" data-id="{{ $item }}" data-action="/admin/menu" data-type="menu" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a-->
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
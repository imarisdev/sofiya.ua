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
                            <a href="/admin/redirects/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($redirects) && count($redirects) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Редиректы</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>URL from</td>
                            <td>URL to</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($redirects as $redirect)
                            <tr class="admin-tools-wrap redirect-{{ $redirect->id }}">
                                <td>{{ $redirect->id }}</td>
                                <td width="30%"><a href="/admin/redirects/edit/{{ $redirect->id }}">{{ $redirect->url_from }}</a></td>
                                <td width="30%"><a href="/admin/redirects/edit/{{ $redirect->id }}">{{ $redirect->url_to }}</a></td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $redirect->id }}" data-action="/admin/redirects" data-type="redirect" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
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
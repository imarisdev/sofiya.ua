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
                            <a href="/admin/pages/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($pages) && count($pages) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Статьи</h3>

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
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pages as $page)
                            <tr class="admin-tools-wrap page-{{ $page->id }}">
                                <td>{{ $page->id }}</td>
                                <td width="30%"><a href="/admin/pages/edit/{{ $page->id }}">{{ $page->title }}</a></td>
                                <td>
                                    <a target="_blank" class="btn btn-primary btn-xs pull-right" href="/{{ $page->slug }}">Перейти</a>
                                </td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $page->id }}" data-action="/admin/pages" data-type="page" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $pages->setPath(Request::url())->appends(Request::query())->render() !!}
            </div>
        @endif
    </section>

@endsection
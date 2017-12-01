@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-2">
                            <a class="btn btn-primary" href="/admin/seo/">SEO Мод</a>
                        </div>
                        <div class="col-xs-2">
                            <select name="object_type" class="form-control">
                                <option value="">- Типы -</option>
                                @foreach($types as $tkey => $type)
                                    <option value="{{ $type->object_type }}" @if(Input::get('object_type') == $type->object_type) selected @endif>{{ $type->object_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="query" class="form-control" placeholder="Поиск по URL" value="{{ Request::get('query') }}" />
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-primary">Поиск</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($seo) && count($seo) > 0)
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">SEO-mod</h3>

                    <div class="box-tools">

                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>ID объекта</td>
                            <td>Тип объекта</td>
                            <td>Title</td>
                            <td>Description</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($seo as $s)
                            <tr class="admin-tools-wrap seo-{{ $s->id }}">
                                <td width="5%">{{ $s->id }}</td>
                                <td width="10%"><a href="/admin/{{ $s->object_type }}/edit/{{ $s->object_id }}">{{ $s->object_id }}</a></td>
                                <td width="10%">{{ $s->object_type }}</td>
                                <td width="30%"><a href="/admin/seo/edit/{{ $s->id }}">{{ $s->title }}</a></td>
                                <td width="30%">{{ $s->description }}</td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $s->id }}" data-action="/admin/seo" data-type="seo" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $seo->setPath(Request::url())->appends(Request::query())->render() !!}
            </div>
        @endif
    </section>

@endsection
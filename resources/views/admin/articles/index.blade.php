@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form method="GET" role="form">
                    <div class="row">
                        <div class="col-xs-3">
                            <select name="type" class="form-control">
                                @foreach($types as $tkey => $type)
                                    <option value="{{ $tkey }}" @if(Input::get('type') == $tkey) selected @endif>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-primary">Найти</button>
                            <a href="/{{ Request::path() }}" class="btn btn-primary">Сбросить фильтр</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="/admin/articles/create" class="btn btn-primary pull-right">Добавить</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        @if (!empty($articles) && count($articles) > 0)
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
                            <td>Тип</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($articles as $article)
                            <tr class="admin-tools-wrap article-{{ $article->id }}">
                                <td>{{ $article->id }}</td>
                                <td width="30%"><a href="/admin/articles/edit/{{ $article->id }}">{{ $article->title }}</a></td>
                                <td>{{ $types[$article->type] }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-primary btn-xs pull-right" href="{{ $article->link() }}">Перейти</a>
                                </td>
                                <td>
                                    <div class="admin-tools">
                                        <a target="_blank" href="#" data-id="{{ $article->id }}" data-action="/admin/articles" data-type="article" class="btn btn-danger btn-xs pull-right js-delete-item">Удалить</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="navigation">
                {!! $articles->setPath(Request::url())->appends(Request::query())->render() !!}
            </div>
        @endif
    </section>

@endsection
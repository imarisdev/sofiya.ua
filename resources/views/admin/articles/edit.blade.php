@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/articles/update" data-edit="/admin/articles/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $article->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Изображение</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $article->id or '' }}">
                                <input type="hidden" name="item_type" value="article">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $article->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">URL</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="URL"
                                           value="{{ $article->slug or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="type">Тип материала</label>
                                    @if(!empty($article->type))
                                        {!! Form::select('type', $types, $article->type, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" cols="80">{{ $article->description or '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <span class="btn btn-primary js-call-medialib" type="button" data-toggle="modal" data-target="#medialib">Medialib</span>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $article->content or '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="image">Главная картинка</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Image" />
                                </div>
                                <div class="form-group">
                                    @if(!empty($article->image))
                                        <img src="{{ Helpers::getImage($article->image, '300x260', null, 'fit') }}" alt="..." class="margin">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="box box-fixed">
                        <div class="box-header with-border">
                            <h3 class="box-title">Действия</h3>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right js-admin-button-save">Сохранить</button>
                        </div>
                        <div class="overlay js-overlay" style="display: none;">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @include('admin.medialib.upload')
    </section>
@stop
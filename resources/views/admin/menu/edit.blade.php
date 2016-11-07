@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/menu/update" data-edit="/admin/menu/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $menu->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $menu->id or '' }}">
                                <input type="hidden" name="parent" value="{{ $menu->parent or 0 }}">
                                <input type="hidden" name="sort" value="{{ $menu->sort or 1 }}">
                                <input type="hidden" name="item_type" value="menu">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $menu->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">URL</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="URL"
                                           value="{{ $menu->slug or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="position">Позиция</label>
                                    @if(!empty($menu->position))
                                        {!! Form::select('position', $positions, $menu->position, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('position', $positions, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Статус</label>
                                    @if(!empty($menu->status))
                                        {!! Form::select('status', ['Не выводить', 'Выводить'], $menu->status, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('status', ['Не выводить', 'Выводить'], null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="external">Внешняя ссылка</label>
                                    @if(!empty($menu->external))
                                        {!! Form::select('external', ['Нет', 'Да'], $menu->external, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('external', ['Нет', 'Да'], null, ['class' => 'form-control']) !!}
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
    </section>
@stop
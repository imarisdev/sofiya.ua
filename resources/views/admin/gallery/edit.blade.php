@extends('layouts.admin')
@section('content')
    <section class="content">
        <form role="form" id="pageedit" class="js-admin-form-save" action="/admin/gallery/update" data-edit="/admin/gallery/edit" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="page-header">{{ $gallery->title or '' }}</h2>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                            <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Изображение</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="id" value="{{ $gallery->id or '' }}">
                                <input type="hidden" name="item_type" value="gallery">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ $gallery->title or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">URL</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="URL"
                                           value="{{ $gallery->slug or '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Контент</label>
                                    <textarea id="content" name="content" rows="10" cols="80">{{ $gallery->content or '' }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="form-group">
                                    <label for="slider">Фото</label>
                                    <input type="file" class="form-control" id="slider" name="slider" multiple placeholder="Image" />
                                </div>
                                <div class="row">
                                    @if(!empty($photos) && count($photos) > 0)
                                        @foreach($photos as $photo)
                                            <div class="col-md-3 medialib-{{ $photo->id }}">
                                                <div class="box">
                                                    <div class="box-body">
                                                        <img src="{{ Helpers::getImage($photo->file, '300x260', null, 'fit') }}" alt="..." class="img-thumbnail">
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <a class="btn btn-danger btn-xs pull-right js-delete-item" data-id="{{ $photo->id }}" data-reload="false" data-action="/admin/medialib" data-type="medialib">Удалить</a>
                                                    </div>
                                                    <!-- /.box-footer-->
                                                </div>
                                            </div>
                                        @endforeach
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
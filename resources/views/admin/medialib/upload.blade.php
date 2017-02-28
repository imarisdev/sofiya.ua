<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="medialib" aria-labelledby="medialibLabel">
    <div class="modal-dialog modal-lg modal-xlg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Загрузка изображений</h4>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#upload" data-toggle="tab" aria-expanded="false">Загрузка</a></li>
                        <li class=""><a href="#medialibimages" data-toggle="tab" aria-expanded="true">Библиотека <i class="fa fa-refresh"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="upload">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="medialib-upload">
                                        <div id="js-medialib-upload">Загразка</div>
                                        <span class="max-weight">Максимальный размер файла 4Mb</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="medialibimages">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="medialib-images-block">
                                        <!--span class="loading">Loading...</span-->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <form class="" id="js-medialib-item-info">
                                        <div class="js-medialib-info"></div>
                                        <div class="form-group">
                                            <select class="form-control" name="file_sizes">
                                                <option value="">Оригинал</option>
                                                <option value="_420x0_resize">420x0</option>
                                                <option value="_560x0_resize">560x0</option>
                                                <option value="_760x0_resize">760x0</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="file_float">
                                                <option value="">None</option>
                                                <option value="alignleft">Left</option>
                                                <option value="aligncenter">Center</option>
                                                <option value="alignright">Right</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="linkfile"> Вставить ссылку
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="watermark" checked> Watermark
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span onclick="Medialib.includeImage();" class="btn btn-primary js-medialib-insert-img">Вставить</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
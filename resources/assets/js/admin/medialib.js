Medialib = {
    _medialib: null,
    medialibUploadItem: '#js-medialib-upload',
    medialibItemInfo: '#js-medialib-item-info',
    medialibCallBtnClass: '.js-call-medialib',
    medialibUpload: null,
    medialibFormInfo: null,
    objectId: null,
    objectType: null,
    insertData: null,
    currentInstance: null,
    init: function() {
        _medialib = this;

        this.setObjectId();
        this.setObjectType();

        this.setCurrentInstance();
        /**
         * Форма загрузки
         */
        this.initMedialibUploader(this.medialibUploadItem);

        this.setMedialibFormInfo(this.medialibItemInfo);

        _medialib.loadImages();

        $('a[href="#medialibimages"]').off().on('click', function() {
            _medialib.loadImages();
        });

    },
    setObjectId: function() {
        _medialib.objectId = $('[name=id]').val();
    },
    setObjectType: function() {
        _medialib.objectType = $('[name=item_type]').val();
    },
    setMedialibFormInfo: function(form) {
        _medialib.medialibFormInfo = $(form);
    },
    setCurrentInstance: function() {
        this.currentInstance = $(this.medialibCallBtnClass).data('instance');
    },
    setFormData: function() {

        this.insertData = {};

        infoFields = this.medialibFormInfo.serializeArray();

        $.each(infoFields, function (key, input) {
            _medialib.insertData[input.name] = input.value || '';
        });
    },
    initMedialibUploader: function(form) {

        $(form).off().uploadFile({
            url: "/admin/medialib/upload",
            dragDrop: true,
            fileName: "images",
            returnType: "json",
            showDelete: false,
            showDownload: true,
            statusBarWidth: 600,
            dragdropWidth: 600,
            maxFileSize: 1024 * 4048,
            showPreview: false,
            previewHeight: "100px",
            previewWidth: "100px",
            acceptFiles:"image/*",
            uploadStr: "Загрузить картинку",
            formData: {object_id: _medialib.objectId, object_type: _medialib.objectType},
            onSuccess: function (files, data, xhr, pd) {
                _medialib.addImageThumbnail(data.file);
                $('.ajax-file-upload-statusbar').remove();
                $('a[href="#medialibimages"]').tab('show')
            },
            onError: function() {
                $('.ajax-file-upload-statusbar').remove();
            }
        });
    },
    addImageThumbnail: function(file) {
        thumb = new EJS({url: '/ejs/thumbnail.ejs'}).render(file);
        $('.medialib-images-block').prepend(thumb);
    },
    getImageInfo: function(id) {
        $.ajax({
            url: "/admin/medialib/info",
            data: {id: id},
            dataType: "json",
            method: "POST",
            success: function (data) {
                if(data) {
                    _medialib.addImageInfoThumbnail(data.medialib);
                    // Data
                    /*$('#medialib-item-info img').attr('src', images.images.file + '_150x150_resize' + images.images.ext);
                    $('#medialib-item-info [name=name]').val(images.images.file);
                    $('#medialib-item-info [name=ext]').val(images.images.ext);
                    $('#medialib-item-info [name=media_id]').val(images.id);*/
                } else {
                    console.log('Error img: ' + id);
                }
            }
        });
    },
    addImageInfoThumbnail: function(file) {
        thumb = new EJS({url: '/ejs/thumbnail-info.ejs'}).render(file);
        $('.js-medialib-info').empty().prepend(thumb);
    },
    deleteImage: function(id) {
        $.ajax({
            url: "/admin/medialib/delete/",
            data: {id: id, op: 'delete'},
            dataType: "json",
            method: "POST",
            success: function (data) {
                if(data) {
                    images = data.info;
                    // Clear
                    $('.js-medialib-info').empty();
                    $('.medialib-images-block .item-' + id).remove();

                } else {
                    console.log('Error img: ' + id);
                }
            }
        });
    },
    includeImage: function(e) {
        this.setFormData();
        attach = new EJS({url: '/ejs/attach_file.ejs'}).render(_medialib.insertData);
		console.log(attach);
        if (this.currentInstance && this.currentInstance.length > 0) {
            CKEDITOR.instances[this.currentInstance].insertHtml(attach);
        } else {
            CKEDITOR.instances.content.insertHtml(attach);
        }


        $('#medialib').modal('hide');
    },
    loadImages: function() {

        if (_medialib.objectId) {
            $.ajax({
                url: "/admin/medialib/load",
                data: {object_id: _medialib.objectId, object_type: _medialib.objectType},
                dataType: "json",
                method: "POST",
                success: function (data) {
                    if (data) {
                        $('.medialib-images-block').empty();
                        for (i in data) {
                            _medialib.addImageThumbnail(data[i]);
                        }
                    } else {
                        console.log('Error load images');
                    }
                }
            });
        }
    }
};

Medialib.init();
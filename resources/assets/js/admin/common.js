$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
    var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

    if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
    }
});

var Admin = {
    _this: null,
    formClass: '.js-admin-form-save',
    formSaveBtnClass: '.js-admin-button-save',
    formDeleteBtnClass: '.js-delete-item',
    formOverlayClass: '.js-overlay',
    formSelectClass: '.js-form-select',
    formDatePickerClass: '.js-date-picker',
    formData: null,
    formOverlay: null,
    editForm: null,
    editAction: null,
    saveBtn: null,
    deleteBtn: null,
    itemEditLink: null,
    init: function() {

        _this = this;

        /**
         * Форма
         */
        this.setEditForm(this.formClass);
        this.setEditAction();
        this.setTtemEditLink();

        /**
         * Кнопки
         */
        this.setSaveBtn(this.formSaveBtnClass);
        this.setDeleteBtn(this.formDeleteBtnClass);

        /**
         * Блокировка рабочего окна
         */
        this.setFormOverlay(this.formOverlayClass);

        /**
         * Инициализация селект полей
         */
        this.formSelectInit();

        /**
         * Инициализация редактора
         */
        this.initCKEditor();

        /**
         * Инициализация поля даты
         */
        this.initDatePicker();

        /**
         * Сохранение данных формы
         */
        this.saveBtn.on('click', function(e) {
            e.preventDefault();
            _this.sendData();
        });

        /**
         * Удаление итема
         */
        this.deleteBtn.on('click', function(e) {
            e.preventDefault();
            _this.deleteItem(this);
        });
    },
    setEditForm: function(form) {
        this.editForm = $(form);
    },
    setEditAction: function() {
        this.editAction = this.editForm.attr('action');
    },
    setSaveBtn: function(btn) {
        this.saveBtn = $(btn);
    },
    setDeleteBtn: function(btn) {
        this.deleteBtn = $(btn);
    },
    setFormOverlay: function(overlay) {
        this.formOverlay = $(overlay);
    },
    setFormData: function() {

        this.updateCKEditor();

        this.formData = new FormData();

        $('input[type="file"]').each(function ($i) {
            files = $(this)[0].files;
            for(var f = 0; f < files.length; f++) {
                _this.formData.append($(this).prop("id") + '[' + f + ']', files[f]);
            }
        });

        var formFields = this.editForm.serializeArray();
        $.each(formFields, function (key, input) {
            _this.formData.append(input.name, input.value);
        });
    },
    setTtemEditLink: function() {
        this.itemEditLink = this.editForm.data('edit');
    },
    initCKEditor: function() {
        if($('[name=content]').length > 0) {
            CKEDITOR.replace('content', {
                height: '300',
                extraAllowedContent: 'div(*); span(*); blockquote(*); p(*); ul(*); ol(*)',
                allowedContent: true,
                enterMode: CKEDITOR.ENTER_P,
                forceEnterMode: true
            });
        }
    },
    updateCKEditor: function() {
        for (i in CKEDITOR.instances) {
            CKEDITOR.instances[i].updateElement();
        }
    },
    initDatePicker: function() {
        $(this.formDatePickerClass).each(function(indx, element) {
            $(element).datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
    },
    formSelectInit: function() {
        $(this.formSelectClass).each(function(indx, element) {
            $(element).select2();
        });
    },
    sendData: function(e) {

        this.setFormData();

        $.ajax({
            url: this.editAction,
            data: this.formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            beforeSend: function(e) {
                _this.formOverlay.show();
            },
            success: function (data) {
                _this.formOverlay.hide();
                _this.processItem(data);
            },
            error: function(data) {
                _this.formOverlay.hide();
                _this.showError(data);
            }
        });
    },
    processItem: function(data) {
        if(data.item) {
            location.href = this.itemEditLink + '/' + data.item.id;
        } else {
            console.log(data);
        }
    },
    deleteItem: function(item) {

        var item_id = $(item).data('id');
        var item_type = $(item).data('type');
        var item_action = $(item).data('action');
        var item_reload = $(item).data('reload');

        if (confirm("Удалить объект с ID: " + item_id)) {

            $.ajax({
                type: "POST",
                url: item_action + '/delete',
                data: {id: item_id},
                success: function (data) {
                    if (data.item) {
                        $('.' + item_type + '-' + item_id).remove();
                        if(item_reload !== false) {
                            location.href = item_action;
                        }
                    }
                },
                error: function (data) {
                    _this.showError(data);
                }
            });
        }
    },
    showError: function(data) {
        var data = JSON.parse(data.responseText);
        if(data.error) {

            html = '';

            for(i in data.msg) {
                html += '<p>' + data.msg[i] + '</p>';
            }

            $('#errors_modal').modal();
            $('#errors_modal').on('shown.bs.modal', function() {
                $('#errors_modal').find('.modal-body').empty().append(html);
            });
        }
    }
};

Admin.init();
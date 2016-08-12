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
        this.formData = new FormData();

        $('input[type="file"]').each(function ($i) {
            this.formData.append($(this).prop("id"), $(this)[0].files[0]);
        });

        var formFields = this.editForm.serializeArray();
        $.each(formFields, function (key, input) {
            _this.formData.append(input.name, input.value);
        });
    },
    setTtemEditLink: function() {
        this.itemEditLink = this.editForm.data('edit');
    },
    updateCKEditor: function() {

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
                _this.updateCKEditor();
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

        if (confirm("Удалить объект с ID: " + item_id)) {

            $.ajax({
                type: "POST",
                url: item_action + '/delete',
                data: {id: item_id},
                success: function (data) {
                    if (data.item) {
                        $('.' + item_type + '-' + item_id).remove();
                        location.href = item_action;
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
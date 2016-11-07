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
    formSelectAjaxClass: '.js-form-select-ajax',
    formDatePickerClass: '.js-date-picker',
    formChangeClass: '.js-change-input',
    formData: null,
    formOverlay: null,
    editForm: null,
    editAction: null,
    editItem: null,
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
        this.setEditItem(this.formChangeClass);
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
        this.formSelectAjaxInit();

        /**
         * Инициализация редактора
         */
        this.initCKEditor();

        /**
         * Инициализация поля даты
         */
        this.initDatePicker();

        /**
         * Наблюдение за изменяемыми полями
         */
        this.watchEditableItems();

        /**
         * Сортировки меню
         */
        this.sortableInit();

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
    setEditItem: function(input) {
        this.editItem = $(input);
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
    formSelectAjaxInit: function() {
        $(this.formSelectAjaxClass).each(function(indx, element) {
            $(element).select2({
                ajax: {
                    url: $(this).data('load'),
                    dataType: 'json',
                    method: 'POST',
                    cache: false,
                    allowClear: true,
                    data: function() {
                        return {[$(this).data('depend')]: $('[name=' + $(this).data('depend') + ']').val()};
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.items.data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    }
                },
                templateResult: _this.formatRepoSelection,
                templateSelection: _this.formatRepoSelection
            });
        });
    },
    formatRepo: function(repo) {
        if (repo.loading) return repo.text;

        var markup = "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.title + "</div>";

        markup += "</div></div>";

        return markup;
    },
    formatRepoSelection: function(repo) {
        return repo.title;
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
            if(data.item.id) {
                location.href = this.itemEditLink + '/' + data.item.id;
            } else {
                location.reload();
            }
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
    },
    watchEditableItems: function() {
        this.editItem.on('change', function(e) {
            _this[$(this).data('callback')](this, $(this).data('to'));
        });
    },
    loadPlans: function(item, to) {
        $('[name=plan_id]').empty();

        $.ajax({
            url: '/admin/plans/load',
            data: {house_id: $('[name=house_id]').val()},
            dataType: 'json',
            type: 'POST',
            beforeSend: function(e) {

            },
            success: function (data) {
                if(data.items.data.length > 0) {
                    for(i in data.items.data) {
                        $('[name=plan_id]').append('<option value="' + data.items.data[i].id + '">' + data.items.data[i].title + '</option>');
                    }
                }
            },
            error: function(data) {
                _this.showError(data);
            }
        });
    },
    sortableInit: function() {
        var oldContainer;
        $(".js-sortable-menu").sortableLists({
            currElClass: 'currElemClass',
            currElCss: {'background-color':'#efefef', 'color':'#fff'},
            placeholderClass: 'placeholderClass',
            placeholderCss: {'background-color':'#ececec'},
            hintClass: 'hintClass',
            hintCss: {'background-color':'#efefef', 'border':'1px dashed white'},
            ignoreClass: 'clickable',
            onChange: function(cEl) {
                console.log('onChange');
            },
            complete: function(currEl) {
                id = $(currEl).data('id');
                parent = $(currEl).parents('li').data('id');
                $('[name=menu_item_parent\\[' + id + '\\]]').val(parent);
                _this.updateSortPositions(currEl);
            }
        });
    },
    updateSortPositions: function(element) {
        var element_parent = $(element).parent();
        $(element_parent).find('li').each(function(index, element){
            $(element).find('[name=menu_item_sort\\[' + $(element).data('id') + '\\]]').val(index + 1);
        });
    }
};

Admin.init();

var Comments = {
    _this: null,
    commentFormClass: '.js-comment-form',
    commentSendBtnClass: '.js-comment-send-btn',
    commentsListClass: '.js-comments-list',
    commentForm: null,
    commentAction: null,
    commentFormData: null,
    commentSendBtn: null,
    commentsList: null,
    init: function() {
        _this = this;

        this.setCommentForm(this.commentFormClass);
        this.setCommentSendBtn(this.commentSendBtnClass);
        this.setCommentAction();

        this.setCommentsList(this.commentsListClass);
        /**
         * Отправить комментарий
         */
        this.commentSendBtn.on('click', function(e) {
            e.preventDefault();
            _this.sendData();
        });
    },
    setCommentForm: function(form) {
        this.commentForm = $(form);
    },
    setCommentAction: function() {
        this.commentAction = this.commentForm.attr('action');
    },
    setFormData: function() {
        this.commentFormData = new FormData();

        var formFields = this.commentForm.serializeArray();
        $.each(formFields, function (key, input) {
            _this.commentFormData.append(input.name, input.value);
        });
    },
    setCommentSendBtn: function(btn) {
        this.commentSendBtn = $(btn);
    },
    setCommentsList: function(list) {
        this.commentsList = $(list);
    },
    sendData: function(e) {

        this.setFormData();

        $.ajax({
            url: this.commentAction,
            data: this.commentFormData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            beforeSend: function(e) {
                //_this.formOverlay.show();
            },
            success: function (data) {
                //_this.formOverlay.hide();
                _this.processItem(data);
                _this.clearForm();
            },
            error: function(data) {
                //_this.formOverlay.hide();
                _this.showError(data);
            }
        });
    },
    processItem: function(data) {
        comment = new EJS({url: '/ejs/comment.ejs'}).render(data.item);
        this.commentsList.append(comment);
    },
    showError: function(data) {

    },
    clearForm: function() {
        this.commentForm[0].reset();
    }
};


$(document).ready(function() {

    Comments.init();

});
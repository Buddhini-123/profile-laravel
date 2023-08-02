$(function (){

    $(document).on('click', '.save_email', function (e) {

        e.preventDefault();

        var data = {
            'title_identifier': $('#title_identifier').val(),
            'email_identifier': $('#email_identifier').val(),
            'sender_email': $('#sender_email').val(),
            'login': $('[name="login"]:checked').val(),
            'sender_eng': $('#sender_eng').val(),
            'id':$('#id').val(),
            'title': $('#title').val(),
            'body': $('.ql-editor').html(),
            'footer': $('#footer').val(),
            'type': $('#type').val(),
            'status': $('#status').val(),
            'banner': $('#banner').val(),
            'cc': $('#cc').val(),
            'reply_to': $('#reply_to').val(),
            'bcc': $('#bcc').val(),

        }
        console.log(data);

        $.ajax({
            url: "/email/store",
            type: "POST",
            cache: false,
            data:data,
            dataType: "json",
            beforeSend: function(request) {

                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success:function (response) {
                if (response.status == 0) {
                    $(".error-text").html("");
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });

                } else {
                    swal("Successfully Updated User");
                }
            }
        });
    });
    $(document).on('click', '#type', function(e) {
        e.preventDefault();

        var data = {
            id: $(this).attr("data-id"),
            type: $(this).attr("data-type"),
            body: $(this).attr("data-body"),

        }


        // 1.fetch the data category value.
        // 2.then the category using ajax get the related email
        // 3.get the result run the foreach append email li

        $.ajax({
            url: "/email/ajax-get",
            type: "POST",
            cache: false,
            dataType: "json",
            data:data,
            beforeSend: function(request) {

                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success:function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });

                } else {
                    //console.log(data.id);
                    //console.log(response.email);
                    $('.todo-task-list').html('');

                     $.each(response, function( key, value ) {
                        //console.log(value.body_eng);
                        $('.email-list').append(' <li class="todo-items">\n' +
                            '                                        <div class="todo-title-wrapper">\n' +
                            '                                            <div class="todo-title-area">\n' +
                            '                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical drag-icon"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>\n' +
                            '                                                <div class="title-wrapper">\n' +
                            '                                                    <div class="custom-control custom-checkbox">\n' +
                            '                                                        <input type="checkbox" class="body click_category custom-control-input" id="body">\n' +
                            '                                                        <label class="click_category custom-control-label" for="31"></label>\n' +
                            '                                                    </div>\n' +
                            '                                                    <span class="click_category todo-title">'+value.title_eng+'\n' +
                            '                                                        </span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '                                            <div class="todo-item-action">\n' +
                            '                                                <div class="badge-wrapper mr-1">\n' +
                            '                                          <a href="/email/edit/'+value.id+'" class="btn btn-flat-warning waves-effect">Edit</a>\n' +
                            '                                                   </div>\n' +
                            '                                                <small class="text-nowrap text-muted mr-1">'+value.date_created+'</small>\n' +
                            '                                            </div>\n' +
                            '                                        </div>\n' +
                            '                                    </li>');
                        //console.log(value);
                    });
                }
            }
        });
    });
});


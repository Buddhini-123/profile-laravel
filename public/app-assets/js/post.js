$(function (){
    $(document).on('click', '#post', function(e) {
        e.preventDefault();

        var data = {
            type: $(this).attr("data-posttype"),

        }
        console.log(data);
        $.ajax({
            url: "/post/ajax-get",
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
                    $('.todo-task-list').html('');

                    $.each(response, function( key, value_post ) {
                        $('.post-list').append(' <li class="todo-items">\n' +
                            '                                        <div class="todo-title-wrapper">\n' +
                            '                                            <div class="todo-title-area">\n' +
                            '                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical drag-icon"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>\n' +
                            '                                                <div class="title-wrapper">\n' +
                            '                                                    <div class="custom-control custom-checkbox">\n' +
                            '                                                        <input type="checkbox" class="body click_category custom-control-input" id="body">\n' +
                            '                                                        <label class="click_category custom-control-label" for="31"></label>\n' +
                            '                                                    </div>\n' +
                            '                                                    <span class="click_category todo-title">'+value_post.title+'\n' +
                            '                                                        </span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '                                            <div class="todo-item-action">\n' +
                            '                                                <div class="badge-wrapper mr-1">\n' +
                            '                                          <a href="/post/edit/'+value_post.id+'" class="btn btn-flat-warning waves-effect">Edit</a>\n' +
                            '                                                   </div>\n' +
                            '                                                <small class="text-nowrap text-muted mr-1">'+value_post.dateCreated+'</small>\n' +
                            '                                            </div>\n' +
                            '                                        </div>\n' +
                            '                                    </li>');
                    });
                }
            }
        });
    });

    $(document).on('click', '.save_post', function(e) {
        e.preventDefault();

        var data = {
            'sub_title': $('#sub_title').val(),
            'id':$('#id').val(),
            'title': $('#title').val(),
            'content': $('.ql-editor').html(),
            'slug': $('#slug').val(),
            'status': $('#status').val(),
            'url': $('#url').val(),
            'type': $('#type').val(),

        }
        //console.log(data);

        $.ajax({
            url: "/post/store",
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
                    swal("Successfully Updated Post");
                }
            }
        });
    });
});


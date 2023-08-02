$(function (){
    $(document).on('click', '.save_course', function(e) {

        e.preventDefault();
        var form= $("#course");
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            beforeSend:function (){
                $(form).find('span.error-text').text('');
            },

            success:function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    swal("Successfully Added Course Details");
                }
            }
        });
    });

    $(function (){
        $(document).on('click', '#type', function(e) {
            e.preventDefault();

            var data = {
                type: $(this).attr("data-type"),
            }
            //console.log(data);
            $.ajax({
                url: "/course/ajax-get",
                type: "POST",
                cache: false,
                dataType: "json",
                data:data,
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
                        $('.todo-task-list').html('');

                        $.each(response, function( key, value_course ) {
                            $('.course-list').append(' <li class="todo-items">\n' +
                                '                                        <div class="todo-title-wrapper">\n' +
                                '                                            <div class="todo-title-area">\n' +
                                '                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical drag-icon"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>\n' +
                                '                                                <div class="title-wrapper">\n' +
                                '                                                    <div class="custom-control custom-checkbox">\n' +
                                '                                                        <input type="checkbox" class="body click_category custom-control-input" id="body">\n' +
                                '                                                        <label class="click_category custom-control-label" for="31"></label>\n' +
                                '                                                    </div>\n' +
                                '                                                    <span class="click_category todo-title">'+value_course.type+'\n' +
                                '                                                        </span>\n' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                            <div class="todo-item-action">\n' +
                                '                                                <div class="badge-wrapper mr-1">\n' +
                                '                                          <a href="/course/edit/'+value_course.id+'" class="btn btn-flat-warning waves-effect">Edit</a>\n' +
                                '                                                   </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>\n' +
                                '                                    </li>');
                        });
                    }
                }
            });
        });
    });



    $(function (){
        $(document).on('click', 'ul.course_click li', function(e) {
            e.preventDefault();
            //alert($(this).find("span.tablist").text());

            var data = {
                'application_id':$(this).attr("data-id"),
                'tablist': $(this).find("span.tablist").text(),
                'status_id':$(this).attr("data-statusid"),
            }
            console.log(data);

            $.ajax({
                url: "/coursestatus/store",
                type: "POST",
                cache: false,
                data:data,
                dataType: "json",
                beforeSend: function(request) {

                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success:function (response) {
                    if (response.status == 0) {
                        console.log('error');

                    } else {
                        console.log('success');
                    }
                }
            });
        });
    });
});


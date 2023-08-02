$(function (){
    $(document).on('click', '#name', function(e) {
        e.preventDefault();

        var data = {
            name: $(this).attr("data-name"),
            id: $(this).attr("data-id"),

        }
        console.log(data);
        $.ajax({
            url: "/product/ajax-get",
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

                    $.each(response, function( key, value_product ) {
                        //console.log(value_product.name);
                        $('.product-list').append(' <li class="todo-items">\n' +
                            '                                        <div class="todo-title-wrapper">\n' +
                            '                                            <div class="todo-title-area">\n' +
                            '                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical drag-icon"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>\n' +
                            '                                                <div class="title-wrapper">\n' +
                            '                                                    <div class="custom-control custom-checkbox">\n' +
                            '                                                        <input type="checkbox" class="body click_category custom-control-input" id="body">\n' +
                            '                                                        <label class="click_category custom-control-label" for="31"></label>\n' +
                            '                                                    </div>\n' +
                            '                                                    <span class="click_category todo-title">'+value_product.name+'\n' +
                            '                                                        </span>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '                                            <div class="todo-item-action">\n' +
                            '                                                <div class="badge-wrapper mr-1">\n' +
                            '                                          <a href="/product/edit/'+value_product.id+'" class="btn btn-flat-warning waves-effect">Edit</a>\n' +
                            '                                                   </div>\n' +
                            '                                            </div>\n' +
                            '                                        </div>\n' +
                            '                                    </li>');
                    });
                }
            }
        });
    });
    $(document).on('click', '.save_product', function(e) {
        e.preventDefault();


        var data = {
            'product_id':$('#product_id').val(),
            'name':$('#name').val(),
            'operator':$('#operator').val(),
            'id':$('#id').val(),
            'description': $('#description').val(),
            'price': $('#price').val(),
            'status': $('#status').val(),

        }
        //console.log(product_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/product/store",
            type: "POST",
            cache: false,
            data:data,
            dataType: "json",
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success:function (response) {
                if (response.status == 0) {
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


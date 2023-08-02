$(document).ready(function() {
   $('.delivery-form').hide();

    $(document).on('click', '.save_delivery', function(e) {
        e.preventDefault();

        var data = {
            'id':$('.address_id').val(),
            'user_id': $('.user_id').val(),
            'address': $('.address').val(),
            'postal_code': $('.postal_code').val(),
            'city': $('.city').val(),
            'state': $('.state').val(),
            'country': $('.country').val(),
            'is_default': $('.is_default').val(),
            'comments': $('.comments').val(),
        }
        console.log(data);
        //var form= $("#delivery_form");
        $.ajax({
            // type: form.attr('method'),
            // url: form.attr('action'),
            // data: data,
            type: 'POST',
            url: "/delivery/store",
            data:data,
            dataType: "json",
            beforeSend: function(request) {

                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success:function (data) {
                if (data.status == 0) {
                    $(".error-text").html("");
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else
                {
                    $('.list-delivery-address').html('');
                    data.delivery_address.forEach(element => {
                        //console.log(element);
                        if (element.is_default)
                        {
                            $('.list-delivery-address').append(
                                '<li  class="list-group-item d-flex justify-content-between align-item-center list-group-item ' +
                                'list-group-item-success"><span>' + element.address + ', ' + element.postal_code + ', ' + element.city + ', ' + element.state + ' ,'+ element.country + '</span>' +
                                '<span data-id="' + element.id + '"' +
                                'data-address="' + element.address + '"' +
                                'data-postal_code="' + element.postal_code + '"' +
                                'data-city="' + element.city + '"' +
                                'data-state="' + element.state + '"' +
                                'data-country="' + element.country + '"' +
                                'data-is_default="' + element.is_default + '"' +
                                'class="badge badge-primary badge-pill edit_address">Edit</span></li > '
                            );
                        } else
                        {
                             $('.list-delivery-address').append(
                                '<li  class="list-group-item d-flex justify-content-between align-item-center list-group-item ' +
                                '"><span>' + element.address + ', ' + element.postal_code + ', ' + element.city + ', ' + element.state + ' ,'+ element.country + '</span>' +
                                '<span data-id="' + element.id + '"' +
                                'data-address="' + element.address + '"' +
                                'data-postal_code="' + element.postal_code + '"' +
                                'data-city="' + element.city + '"' +
                                'data-state="' + element.state + '"' +
                                'data-country="' + element.country + '"' +
                                'data-is_default="' + element.is_default + '"' +
                                'class="badge badge-primary badge-pill edit_address">Edit</span></li > '
                            );
                        }
                         $('.delivery-form').hide();
                    });


                    swal("Successfully Added Delivery Details");
                }
            }
        });
    });

    $(document).on('click', '.edit_address', function(e) {
        e.preventDefault();



        $('#address_id').val($(this).attr("data-id"));
        $('#address').val($(this).attr("data-address"));
        $('#postal_code').val($(this).attr("data-postal_code"));
        $('#city').val($(this).attr("data-city"));
        $('#country').val($(this).attr("data-country"));
        $('#state').val($(this).attr("data-state"));
        $('#is_default').val($(this).attr("data-is_default"));
        $('.delivery-form').show();

    });

    $(document).on('click', '.add_new_delivery', function(e) {

        //$("#delivery_form").trigger("reset");
        //$("#delivery_form")[0].reset();
        //document.getElementById('delivery_form').reset();
        //
        // $('form#delivery_form').trigger("reset");
        // console.log($('#delivery_form')[0]);
        $('#user_id').val('');
        $('#address_id').val('');
        $('#address').val('');
        $('#postal_code').val('');
        $('#city').val('');
        $('#state').val('');
        $('#country').val('');
        $('#is_default').val('');

        // $(':input','#delivery_form')
        //     .not(':button, :submit, :reset, :hidden')
        //     .val('')
        //     .removeAttr('checked')
        //     .removeAttr('selected');

        e.preventDefault();
         $('.delivery-form').show();

    });

});


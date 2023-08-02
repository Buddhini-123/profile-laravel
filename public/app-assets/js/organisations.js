$(function (){
    $(document).on('click', '.save_organisation', function(e) {

        e.preventDefault();
        var form= $("#organization");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
                    swal("Successfully Added Coupon");
                }
            }
        });
    });
});


$(function (){
    $(document).on('click', '.save_campaign', function(e) {

        e.preventDefault();
        var form= $("#membership-campaign");
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
                    swal("Successfully Added Campaign");
                }
            }
        });
    });
});



$(function (){
    $('#role-update').on('submit',function (e){
        e.preventDefault();


        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function (){
                $(document).find('span.error-text').text('');
            },


            success:function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    //location.reload();
                    //$("#roles").trigger("reset");
                    swal("Successfully Added Role");
                    $('inlineForm').modal('hide');
                    timeout:12000

                }
            }

        });
    });
});


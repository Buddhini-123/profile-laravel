$(document).ready(function() {

    $(document).on('click', '.update_scientific', function(e) {
        e.preventDefault();

        var form= $("#scientific_form");
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success:function (data) {
                if (data.status == 0) {
                    //console.log(error);
                } else {
                    swal("Successfully Updated");
                }
            }
        });
    });

});

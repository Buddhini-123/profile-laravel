$(function (){
    $(document).on('click', '#change_picture_btn',function (){
       //$('#admin_image').click();
    });

    $('#admin_image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#image_preview_container').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

    $('#admin_image').change(function(e) {

        let form_data = new FormData();
        form_data.append("admin_image", e.target.files[0]);

        $.ajax({
            preview:'.user_picture',
            url: '/user/change-profile-picture',
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            data: form_data,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    location.reload();
                    swal("Successfully Added Image");
                    timeout:15000
                }
            }

        });
    });


});

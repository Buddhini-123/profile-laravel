$(function (){
    $(document).on('click','#deleteCountryBtn',function (){
        var user_id = $(this).data('id');
        alert(user_id);
        var url = '<?= route("delete.image")?>';

        swal.fire({
            title:'Are you sure?',
            html:'You want to <b>delete</b> this image',
            showCancelButton:true,
            cancelButtonText:'Cancel',
            confirmButtonText:'Yes,Delete',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#556ee6',
            width:300,
            allowOutsideClick:false
        }).then(function (result){
            if (result.value){
                $.post(url,{user_id:user_id},function (data){
                    if (data.code == 1){
                        $('#delete').DataTable().ajax.reload(null,false);
                        toastr.success(data.msg);
                    }else {
                        toastr.error(data.msg);
                    }
                },'json');
            }

        });

    });

});

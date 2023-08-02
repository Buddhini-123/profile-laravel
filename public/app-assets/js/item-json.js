$(function (){
    $(document).on('click', '.save_json', function(e) {
        //get custom fields data and add to an array
        var formdata = $('#item_json').serializeArray();

        //console.log(formdata);
        console.log($(this).attr('in1[index]'));

        $('input[name^="in"]').each(function() {

            formdata.push({name: $(this).attr('name').slice(3,$(this).attr('name').length-1),option:null ,value: $(this).val()});
            //console.log($(this).attr('name'));

            // $.ajax({
            //     type: form.attr('method'),
            //     url: form.attr('action'),
            //
            //     success:function (response) {
            //         if (response.status == 0) {
            //
            //         } else {
            //
            //         }
            //     }
            // });

        });
    });
});

// formdata.push({name: $(this).attr('name').slice(3,$(this).attr('name').length-1),option:null ,value: $(this).val()});
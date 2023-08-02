$(document).ready(function() {

    $(document).on('click', '.update_mem', function(e) {
        e.preventDefault();
        var data = {
            'membership_id': $('#id').val(),
            'membership_renewal_type': $('#membership_renewal_type').val(),
            'membership_renewal_category': $('#renewal_cateory').val(),
            'membership_history': $('#history').val(),
            'skype': $('#skype').val(),
            'about_yourself': $('#yourself').val(),
            'quantity_paper_journal': $('#paper_journal').val(),
            'prop_working_groups': $('#prop_working').val(),
            'reference': $('#reference').val(),
            'origin': $('#origin').val(),
            'renewal_status': $('#renewal_status').val(),
            'validity_status': $('#validity_status').val(),
            'payment_source_tag': $('#payment_source_tag').val(),
            'current_membership_category': $('#current_membership_category').val(),
            'share_profile_agreed': $('#share_profile_agreed').val(),
            'membership_status': $('#membership_status').val(),
             'preferred_method_of_contact': $('#preffered').val(),
            'preferred_method_of_contact_email': $('#email').val(),
            'preferred_method_of_contact_message': $('#message').val(),
            'preferred_method_of_contact': $('#phone').val(),
        }
        //console.log(data);

        var form= $("#addmembership");

        $.ajax({
            url: '/view/store',
            type: "POST",
            cache: false,
            data:data,
            //dataType: "json",
            beforeSend: function(request) {

                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success:function (response) {
            //console.log(response)
                if (response.status == 0) {
                    $(".error-text").html("");
                        // $("#renewal_type").after('<span class="text-danger error-text">Please select the membership renewal type field</span>');
                        // $("#validity_status").after('<span class="text-danger error-text">Please select the validity status field</span>');
                        // $("#origin").after('<span class="text-danger error-text">Please select the origin field</span>');
                        // $("#membership_status").after('<span class="text-danger error-text">Please select the membership status field</span>');
                        // $("#share_profile_agreed").after('<span class="text-danger error-text">This field is required</span>');

                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });

                } else {
                    swal("Successfully Updated Membership");
                }

        }
        });
    });

    $(document).on('change', '#renewal_cateory', function(e) {
        // console.log('changing');

        //var form= $("#renewal_type");
        var id = $(this).val();
        var a = $(this).parent();
        var op = "";
        //console.log(id);
        $.ajax({
            // type: form.attr('method'),
            // url: form.attr('action'),
            // data: form.serialize(),
            type: 'get',
            data:{'id':id},
            url: '/find-renewal',
            dataType:'json',
            success:function (data){
                //console.log("label_eng");
                console.log(data)
                // var html = '<div className="col-md-4">'+
                //     '<div className="form-group">'+
                //         '<label htmlFor="status">'+ 'Membership Renewal Category' +'</label>'+
                //         '<select className="form-control" value="" id="membership_renewal_type"'+
                //                 'name="membership_renewal_type">'+
                //             '<option selected>'+'Choose' +'</option>'+
                //         '</select>'+
                //         '<span className="text-danger error-text membership_renewal_type_error"></span>'+
                //     '</div>'+
                // '</div>';



                //a.find('.membership_renewal_type').val(data);

                //$('.membership_renewal_type').val(data);
            },
            error:function (){

            }
        });

    });
});





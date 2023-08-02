$(function (){
        $(document).on('click', '.update_pro', function(e) {
            e.preventDefault();
            $('.error-text').text('');
            var data = {
                'id': $('#id').val(),
                'title': $('#title').val(),
                'surname': $('#surname').val(),
                'first_name': $('#first_name').val(),
                'second_name': $('#second_name').val(),
                'job_title': $('#job_title').val(),
                'job_category': $('#job_category').val(),
                'organisation_id': $('#organisation_id').val(),
                'department': $('#department').val(),
                'email': $('#email').val(),
                'alternative_email': $('#alternative_email').val(),
                'city': $('#city').val(),
                'address_line1': $('#address_line1').val(),
                'address_line2': $('#address_line2').val(),
                'address_line3': $('#address_line3').val(),
                'po_code': $('#po_code').val(),
                'state': $('#state').val(),
                'country': $('#country').val(),
                'telephone': $('#telephone').val(),
                'marketing_opt': $('#marketing_opt').val(),
                'deceased': $('#deceased').val(),
                'telephone_country_code': $('#telephone_country_code').val(),
                'status': $('#status').val(),
                'origin': $('#origin').val(),
                'heard_about': $('#heard_about').val(),
                'type_of_institution': $('#type_of_institution').val(),
                'qualification': $('#qualification').val(),
                'language': $('#language').val(),
                'role': $('#role').val(),
                'save_type_as': $("input[name='save_type_as']:checked").val(),
                
            }
           

                $.ajax({
                    url: "/user/store",
                    type: "POST",
                    cache: false,
                    data:data,
                    dataType: "json",
                    beforeSend: function(request) {

                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success:function (response) {
                        //console.log(response)
                        if (response.status == 0) {
                            $(".error-text").html("");
                            $.each(response.error, function (prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });


                        } else {
                            swal("Successfully Updated User");
                        }
                    }
                });
        });


/*-----------------------User profile- form validate-----------------------------------------------*/
/*-----------------input types validate -------------------*/
$(".validation").focusout(function (e) {

    e.preventDefault();
 
    var name = $(this).attr("name");
    var value = $(this).val();
    var data = {};
    data[name] = value;
    data["input_name"] = name;
    
    userValidation(data,name);
  });
  /*-----------------input types validate end-------------------*/
  /*-----------------select types validate -------------------*/
  $(".select-validation").change(function (e) {
  
    e.preventDefault();
  
    var name = $(this).attr("name");
    var value = $(this).val();
    var data = {};
    data[name] = value;
    data["input_name"] = name;
    
    userValidation(data,name);
  });
  /*-----------------select types validate end-------------------*/
  /*---------------------Ajax submit-----------------------------------------------------*/
  
  function userValidation(data,name){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $.ajax({
        type: "POST",
        url: "/user/profile-validation",
        data: data,
        
        success: function (response) {
          $('span.'+response.success+'_error').text('');
        
            $.each(response.errors, function(prefix, val){
              if (jQuery.inArray(name, response.errors)) {
                $('span.'+prefix+'_error').text(val[0]);
            }
              
          });
        },
  
    });
  }
  /*---------------------------User profile-form validate-end------------------------------------------*/
  /*-------------------------add_new_organization--------------------------------------*/
$('#add-new-organization').submit(function(e){
  
  e.preventDefault();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
  url: "/membership/add-new-organization",
  method: "post",
  data:$("#add-new-organization").serialize(),
  success: function (response) {
    $('span.'+response.success+'_error').text('');
  
 },
  error:function(response) {
    console.log(response);
    $.each(response.responseJSON.errors, function(prefix, val){
      $('span.'+prefix+'_error').text(val[0]);
  });

  }
});
});
/*-------------------------add_new_organization--end----------------------------------*/
/*-----------------------organization details- form validate-----------------------------------------------*/
/*-----------------input types validate -------------------*/
$(".validation").focusout(function (e) {

  e.preventDefault();

  var name = $(this).attr("name");
  var value = $(this).val();
  var data = {};
  data[name] = value;
  data["input_name"] = name;
  
  validation(data,name);
});
/*-----------------input types validate end-------------------*/
/*-----------------select types validate -------------------*/
$(".select-validation").change(function (e) {

  e.preventDefault();

  var name = $(this).attr("name");
  var value = $(this).val();
  var data = {};
  data[name] = value;
  data["input_name"] = name;
  
  validation(data,name);
});
/*-----------------select types validate end-------------------*/
/*---------------------Ajax submit-----------------------------------------------------*/

function validation(data,name){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
      type: "POST",
      url: "/organisations/validation",
      data: data,
      
      success: function (response) {
        $('span.'+response.success+'_error').text('');
      
          $.each(response.errors, function(prefix, val){
            if (jQuery.inArray(name, response.errors)) {
              $('span.'+prefix+'_error').text(val[0]);
          }
            
        });
      },

  });
}
/*---------------------------organization details-Invoice form validate-end------------------------------------------*/
});
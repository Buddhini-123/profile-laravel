$('#organization-edit').submit(function(e){
    $('.error-text').text('');
  console.log('sss');
  e.preventDefault();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
      type: "POST",
      url: "/organisations/update",
      data: $('#organization-edit').serialize(),
      
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
  /*---------------------------organization details- form validate-end------------------------------------------*/
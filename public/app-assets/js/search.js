$('#result').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "/user/search",
        data:{
            'search':$value
        },
        success:function(data){
            $('tbody').html(data);
        }
    });
})

$("[data-action='edit']").on('click',function(){
  
    var data=$(this).data('organization');
    $('input[name="account_name"]').val(data.account_name);
    $('input[name="phone"]').val(data.phone);
    $('input[name="ceo"]').val(data.ceo);
    $('input[name="type"]').val(data.type);
    $('input[name="website"]').val(data.website);
    $('input[name="cautions"]').val(data.cautions);
    $('input[name="billing_city"]').val(data.billing_city);
    $('input[name="billing_state"]').val(data.billing_state);
    $('input[name="billing_postal_code"]').val(data.billing_postal_code);
    $('textarea[name="description"]').val(data.description);
    $('textarea[name="common_area_of_interest"]').val(data.common_area_of_interest);
    $('select[name="billing_country"]').val(data.billing_country);
    // $('select[name="mb_union_region"]').val(data.mb_union_region);
    
   

    console.log(data);
    
});




/*-------------------------add_new_organization--------------------------------------*/
$('#add-new-organization').submit(function(e){
 e.preventDefault();
 $.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });
 $.ajax({
 url: "/organisations/update",
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
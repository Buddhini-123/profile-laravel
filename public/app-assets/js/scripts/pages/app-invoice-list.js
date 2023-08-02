/*=========================================================================================
    File Name: app-invoice-list.js
    Description: app-invoice-list Javascripts
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
   Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var dtInvoiceTable = $('.invoice-list-table'),
    assetPath = '../../../app-assets/',
    invoicePreview = 'app-invoice-preview.html',
    invoiceAdd = 'app-invoice-add.html',
    invoiceEdit = 'app-invoice-edit.html';

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
    invoicePreview = assetPath + 'app/invoice/preview';
    invoiceAdd = assetPath + 'app/invoice/add';
    invoiceEdit = assetPath + 'app/invoice/edit';
  }

  // datatable
  if (dtInvoiceTable.length) {
    var dtInvoice = dtInvoiceTable.DataTable({
      ajax: assetPath + 'data/invoice-list.json', // JSON file to add data
      autoWidth: false,
      columns: [
        // columns according to JSON
        { data: 'responsive_id' },
        { data: 'invoice_id' },
        { data: 'invoice_status' },
        { data: 'issued_date' },
        { data: 'client_name' },
        { data: 'total' },
        { data: 'balance' },
        { data: 'invoice_status' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          responsivePriority: 2,
          targets: 0
        },
        {
          // Invoice ID
          targets: 1,
          width: '46px',
          render: function (data, type, full, meta) {
            var $invoiceId = full['invoice_id'];
            // Creates full output for row
            var $rowOutput = '<a class="font-weight-bold" href="' + invoicePreview + '"> #' + $invoiceId + '</a>';
            return $rowOutput;
          }
        },
        {
          // Invoice status
          targets: 2,
          width: '42px',
          render: function (data, type, full, meta) {
            var $invoiceStatus = full['invoice_status'],
              $dueDate = full['due_date'],
              $balance = full['balance'],
              roleObj = {
                Sent: { class: 'bg-light-secondary', icon: 'send' },
                Paid: { class: 'bg-light-success', icon: 'check-circle' },
                Draft: { class: 'bg-light-primary', icon: 'save' },
                Downloaded: { class: 'bg-light-info', icon: 'arrow-down-circle' },
                'Past Due': { class: 'bg-light-danger', icon: 'info' },
                'Partial Payment': { class: 'bg-light-warning', icon: 'pie-chart' }
              };
            return (
              "<span data-toggle='tooltip' data-html='true' title='<span>" +
              $invoiceStatus +
              '<br> <span class="font-weight-bold">Balance:</span> ' +
              $balance +
              '<br> <span class="font-weight-bold">Due Date:</span> ' +
              $dueDate +
              "</span>'>" +
              '<div class="avatar avatar-status ' +
              roleObj[$invoiceStatus].class +
              '">' +
              '<span class="avatar-content">' +
              feather.icons[roleObj[$invoiceStatus].icon].toSvg({ class: 'avatar-icon' }) +
              '</span>' +
              '</div>' +
              '</span>'
            );
          }
        },
        {
          // Client name and Service
          targets: 3,
          responsivePriority: 4,
          width: '270px',
          render: function (data, type, full, meta) {
            var $name = full['client_name'],
              $email = full['email'],
              $image = full['avatar'],
              stateNum = Math.floor(Math.random() * 6),
              states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'],
              $state = states[stateNum],
              $name = full['client_name'],
              $initials = $name.match(/\b\w/g) || [];
            $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
            if ($image) {
              // For Avatar image
              var $output =
                '<img  src="' + assetPath + 'images/avatars/' + $image + '" alt="Avatar" width="32" height="32">';
            } else {
              // For Avatar badge
              $output = '<div class="avatar-content">' + $initials + '</div>';
            }
            // Creates full output for row
            var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : ' ';

            var $rowOutput =
              '<div class="d-flex justify-content-left align-items-center">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar' +
              colorClass +
              'mr-50">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<h6 class="user-name text-truncate mb-0">' +
              $name +
              '</h6>' +
              '<small class="text-truncate text-muted">' +
              $email +
              '</small>' +
              '</div>' +
              '</div>';
            return $rowOutput;
          }
        },
        {
          // Total Invoice Amount
          targets: 4,
          width: '73px',
          render: function (data, type, full, meta) {
            var $total = full['total'];
            return '<span class="d-none">' + $total + '</span>$' + $total;
          }
        },
        {
          // Due Date
          targets: 5,
          width: '130px',
          render: function (data, type, full, meta) {
            var $dueDate = new Date(full['due_date']);
            // Creates full output for row
            var $rowOutput =
              '<span class="d-none">' +
              moment($dueDate).format('YYYYMMDD') +
              '</span>' +
              moment($dueDate).format('DD MMM YYYY');
            $dueDate;
            return $rowOutput;
          }
        },
        {
          // Client Balance/Status
          targets: 6,
          width: '98px',
          render: function (data, type, full, meta) {
            var $balance = full['balance'];
            if ($balance === 0) {
              var $badge_class = 'badge-light-success';
              return '<span class="badge badge-pill ' + $badge_class + '" text-capitalized> Paid </span>';
            } else {
              return '<span class="d-none">' + $balance + '</span>' + $balance;
            }
          }
        },
        {
          targets: 7,
          visible: false
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          width: '80px',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center col-actions">' +
              '<a class="mr-1" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Send Mail">' +
              feather.icons['send'].toSvg({ class: 'font-medium-2' }) +
              '</a>' +
              '<a class="mr-1" href="' +
              invoicePreview +
              '" data-toggle="tooltip" data-placement="top" title="Preview Invoice">' +
              feather.icons['eye'].toSvg({ class: 'font-medium-2' }) +
              '</a>' +
              '<div class="dropdown">' +
              '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
              feather.icons['more-vertical'].toSvg({ class: 'font-medium-2' }) +
              '</a>' +
              '<div class="dropdown-menu dropdown-menu-right">' +
              '<a href="javascript:void(0);" class="dropdown-item">' +
              feather.icons['download'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Download</a>' +
              '<a href="' +
              invoiceEdit +
              '" class="dropdown-item">' +
              feather.icons['edit'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Edit</a>' +
              '<a href="javascript:void(0);" class="dropdown-item">' +
              feather.icons['trash'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Delete</a>' +
              '<a href="javascript:void(0);" class="dropdown-item">' +
              feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) +
              'Duplicate</a>' +
              '</div>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[1, 'desc']],
      dom:
        '<"row d-flex justify-content-between align-items-center m-1"' +
        '<"col-lg-6 d-flex align-items-center"l<"dt-action-buttons text-xl-right text-lg-left text-lg-right text-left "B>>' +
        '<"col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0"f<"invoice_status ml-sm-2">>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search Invoice',
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'Add Record',
          className: 'btn btn-primary btn-add-record ml-2',
          action: function (e, dt, button, config) {
            window.location = invoiceAdd;
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['client_name'];
            }
          }),
          type: 'column',
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: 'table',
            columnDefs: [
              {
                targets: 2,
                visible: false
              },
              {
                targets: 3,
                visible: false
              }
            ]
          })
        }
      },
      initComplete: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
        // Adding role filter once table initialized
        this.api()
          .columns(7)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-control ml-50 text-capitalize"><option value=""> Select Status </option></select>'
            )
              .appendTo('.invoice_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      },
      drawCallback: function () {
        $(document).find('[data-toggle="tooltip"]').tooltip();
      }
    });
  }
});
/**/
$(document).ready(function () {
  $(".add-payment").on("click", function (e) {
      $("span.error-text").text("");
      $("#add-payment-form").trigger("reset"); /*-------==>payment form reset(clear all inputs)------*/
      /*------------------change date format--------------------------- */
      let now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      var date = now.getFullYear() + "-" + month + "-" + day;
      /*------------------change date format-end----------------------- */
      $("#transaction_date").val(date); /*-------==>set the date(today) -------------------*/
      var invoice_id = $(this).data("target-invoice_id");
      var membership_id = $(this).data("target-membership_id");
      /* ----------------------------------add due amount--------------------------------- */
      var due_amount=parseInt($('#invoice-table-'+invoice_id).find('.due-amount').text());
      
      $('input[name="amount"]').val(due_amount);
      /* ----------------------------------add due amount-end-------------------------------- */
      $("#invoice_id").val(invoice_id);
      $("#membership_id").val(membership_id);
      $("#membership_payment_id").removeAttr("value"); /*----==> remove payemnt id for add new payment----- */
      $( ".comment-list" ).empty();/*--------------==>Removes all child nodes-(remove all comments)----------*/
  });
});

/**/
/* add payment */

  $('#add-payment-form').submit(function(e){
     e.preventDefault();
     var membership_payment_id=$('#membership_payment_id').val();
   
    if(membership_payment_id){
     
      var url='/invoice/edit-payment';
    }else{
      var url='/invoice/add_payment';

    }
     var invoice_id=$('#invoice_id').val();
  
      /*Ajax Request Header setup*/
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     /* Submit form data using ajax*/
     $.ajax({
        url: url,
        method: 'post',
        data: $('#add-payment-form').serialize(),
        beforeSend:function(){
          $(document).find('span.error-text').text('');
      },
     
        success: function(response){
          
          $('#payment-'+membership_payment_id).remove();
          //------------------------
           var svg1= '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check avatar-icon font-medium-3"><polyline points="20 6 9 17 4 12"></polyline></svg>';
          
        $('#'+invoice_id).append( '<div class="transaction-item" id="payment-'+response[0].id+'">'+
                                '<div class="media">'+
                                    '<div class="avatar bg-light-success rounded">'+
                                      '<div class="avatar-content">'+svg1+'</div>'+
                                    '</div>'+
                                    '<div class="media-body">'+
                                      ' <h6 class="transaction-title">'+response[0].brand_of_payment+'</h6>'+
                                        '<small>'+response[0].source_of_operation+'</small>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="font-weight-bolder text-danger">'+response[0].amount+'</div>'+
                                '<div class="dropdown">'+
                                       '<button type="button" class="btn btn-sm dropdown-toggle hide-arrow"'+
                                           'data-toggle="dropdown">'+
                                           '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>'+
                                        '</button>'+
                                       '<div class="dropdown-menu">'+
                                           '<a class="open-myModal1 dropdown-item form-edit" data-toggle="modal" data-target-invoice_id="'+invoice_id+'"  data-target-membership_payment_id="'+response[0].id+'" data-target="#myModal">'+
                                               '<i data-feather="edit-2" class="mr-50"></i>'+
                                           '<span id="xyz">Editt</span>'+
                                           '</a>'+
                                           '<a class="dropdown-item payment-delete" data-target-membership_payment_id="'+membership_payment_id+'" data-target="#warning" data-toggle="modal">'+
                                               '<i data-feather="trash" class="mr-50"></i>'+
                                               '<span>Delete</span>'+
                                           '</a>'+
                                       '</div>'+
                                   '</div>'+
                              '</div>'
            );
            var invoice_data=response[1];
            displayInvoice(invoice_data);
          },
          error:function(response) {
            console.log(response);
            $.each(response.responseJSON.errors, function(prefix, val){
              $('span.'+prefix+'_error').text(val[0]);
          });
     
          }
      });
     
      // $('#myModal').modal('hide'); 
      // return false;
     });
     /* add payment end*/
/*---------------------------- membership payement form edit-(main)----------------------------------------------------------------------- */
/*------------------------------membership payement form edit(append list)-------------------------------*/
     $(".append-list").on("click", ".form-edit", function (e) {
      e.preventDefault();
      $('span.error-text').text('');/*-----------==>clear all validation errors------------------*/
      var membership_payment_id = $(this).data("target-membership_payment_id");
      var invoice_id = $(this).data("target-invoice_id");
      formEdit(membership_payment_id,invoice_id);
    
  });
  /*------------------------------membership payement form edit(append list)--end-----------------------------*/
  /*------------------------------membership payement form edit----------------------------*/
  $(".form-edit").on("click", function (e) {
    e.preventDefault();
    $("span.error-text").text("");
    $(".validate_error").remove();
    var membership_payment_id = $(this).data("target-membership_payment_id");
    var invoice_id = $(this).data("target-invoice_id");

    formEdit(membership_payment_id, invoice_id);
});
/*------------------------------membership payement form edit-end---------------------------*/

/*------------------------AJAX Submit a Form in jQuery --------------------------------*/
  function formEdit(membership_payment_id,invoice_id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
    url: "/invoice/get-payment_data",
    method: "post",
    data: {
        id: membership_payment_id,
    },
    success: function (response) {
     
      $('#add-payment-form').trigger("reset"); /*-------==>payment form reset(clear all inputs)------*/
      /*------------------change date format--------------------------- */
      let now = new Date(response[0].transaction_date);
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      var date = now.getFullYear()+"-"+(month)+"-"+(day) ;
      /*------------------change date format-end----------------------- */
      $('#transaction_date').val(date);
      $('select[name="source_of_operation"]').val(response[0].source_of_operation);
      $('select[name="source_reference"]').val(response[0].source_reference);
      $('select[name="brand_of_payment"]').val(response[0].brand_of_payment);
      $('input[name="amount"]').val(response[0].amount);
      $('select[name="status"]').val(response[0].status);
      $('select[name="sponsor_id"]').val(response[0].sponsor_id);
      $('select[name="promotion_id"]').val(response[0].promotion_id);
      $('select[name="course_id"]').val(response[0].course_id);
      $('input[name="comment_id"]').val('');
      $('#membership_payment_id').val(membership_payment_id);
      $('#invoice_id').val(invoice_id);

      $( ".comment-list" ).empty();/*--------------==>Removes all child nodes-----------*/
      $('#comment-edit-id').text('#ID');
      $.each(response[1], function(key, val){
 
        $('.comment-list').append('<div id="comment-list-'+val.id+'" class="list-group-item ">'+val.content+
            '<div class="dropdown">'+
            '<button type="button" class="btn btn-sm dropdown-toggle hide-arrow"'+
                'data-toggle="dropdown">'+
                '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>'+
                '<i data-feather="more-vertical"></i>'+
            '</button>'+
            '<div class="dropdown-menu">'+
                '<a class="dropdown-item comment-edit" data-comment="'+val.content+'" data-comment_id="'+val.id+'">'+
                    '<i data-feather="edit-2" class="mr-50"></i>'+
                '<span   id="edit">Editt</span>'+
          
                '</a>'+
                '<a class="dropdown-item comment-delete" data-comment_id="'+val.id+'" data-toggle="modal" data-target="#info">'+
                    '<i data-feather="trash" class="mr-50"></i>'+
                    '<span>Delete</span>'+
                '</a>'+
            '</div>'+
        '</div>'+
            '</div>');
      });
      
    // var invoice_data=;
    },
});
  }
 /*------------------------AJAX Submit a Form in jQuery -end-------------------------------*/

 /*---------------------------- membership payement form edit-(main)--end-------------------------------------------------------------------- */
  $(".comment-list").on("click", ".comment-edit", function (e) {
    e.preventDefault();
  
	  var comment = $(this).data("comment");
    var comment_id = $(this).data("comment_id");
    
    $('textarea[name="comment"]').val(comment);
    $('input[name="comment_id"]').val(comment_id);
    $('#comment-edit-id').text(comment_id);
   
  });
 
 /*-----------------------Transaction details- form validate-----------------------------------------------*/
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
      url: "/invoice/transaction-details-validation",
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
/*---------------------------Transaction details-Invoice form validate-end------------------------------------------*/
/*--------------------------------------------- -----------------------------*/
/*-----------------------------------------------delete comment -------------------------------------------*/
var comment_id ;
$(".comment-list").on("click", ".comment-delete",function(e){
  comment_id =$(this).data('comment_id');
  
});

$('.comment-delete-conform').on('click',function(){
  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
      type: "delete",
      url: "/invoice/transaction-comment-delete",
      data:{comment_id:comment_id} ,
      
      success: function (response) {
      $('#comment-list-'+comment_id).remove();
      },

  });
    
});
/*-----------------------------------------------delete comment end-------------------------------------------*/
/*-----------------------------------------------delete membership payment-------------------------------------------*/
var membership_payment_id ;
$('.payment-delete').on('click',function(e){
 membership_payment_id =$(this).data('target-membership_payment_id');
});

$('.payment-delete-conform').on('click',function(){
  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
      type: "delete",
      url: "/invoice/membership-payment-delete",
      data:{membership_payment_id:membership_payment_id} ,
      
      success: function (response) {
      $('#payment-'+membership_payment_id).remove();
      $(".append-list").find('#payment-'+membership_payment_id).remove();
      },

  });
    
});
/*-----------------------------------------------delete membership payment-end------------------------------------------*/
/*----------------------------delete invoice itmes----------------------------*/
var membership_invoice_item_id;
$('.invoice-item-delete').on('click',function(e){
  membership_invoice_item_id =$(this).data('mb_invoice-item-id');

e.preventDefault();
});
$('.invoice-item-delete-conform').on('click',function(e){
  e.preventDefault();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
      type: "delete",
      url: "/invoice/invoice-items-delete",
      data:{membership_invoice_item_id:membership_invoice_item_id} ,
      
      success: function () {
      $('#invoice-item-'+membership_invoice_item_id).remove();
      },

  });
});
/*----------------------------delete invoice itmes-end---------------------------*/
/*----------------------------------------------invoice items update -------------------------------------*/
/*----------get invoice item deltais---------------*/
var invoice_item_id;
var price;
$('.invoice-item-edit').on('click',function(){
   invoice_item_id=$(this).data('invoice_item_id');
   price=$(this).data('price');
  var quantity=$(this).data('quantity');
  $('#quantity').val(quantity);

});
/*--------get invoice item deltais-/-----------*/

$('.invoice-item-update').on('click',function(){
  
  var quantity=$('#quantity').val();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
  url: "/invoice/get-invoice-item-data",
  method: "post",
  data: {
    invoice_item_id: invoice_item_id,
    quantity:quantity,
    price:price,
  },
  success: function (response) {
 
    $('.invoice-items').find('#amount-'+response[0].id).text(response[0].amount);
    $('.invoice-items').find('#quantity-'+response[0].id).text(response[0].quantity);
    $('#total-'+response[0].invoice_id).text(response[1]);

    var invoice_data=response[2];
    displayInvoice(invoice_data);
  }
  });
});
/*----------------------------------------------------------invoice items update -end---------------------------------------------*/
/*------------------------change invoice discount----------------------------------- */
$('.change-discount').on('click',function(){
  var id=$(this).data('invoice-id');
  var discount=$(this).data('discount');
  var list_amount=$('#invoice-table-'+id).find('.list-amount').text();
  $('.invoice-alter').find('#list-amount').val(list_amount);
  $('.invoice-alter').find('#discount-amount').val(discount);
  $('.invoice-alter').find('#invoice-id').val(id);
});

$('.invoice-alter').on('submit',function(e){
 e.preventDefault();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
  url: "/invoice/change-invoice-discount",
  method: "post",
  data:$(".invoice-alter").serialize(),
  success: function (invoice_data) {
    displayInvoice(invoice_data);
  }
});
});
/*------------------------change invoice discount--end--------------------------------- */
/*---------------------------------edit invoice--------------------------------------- */
$('.invoice-edit').on('click',function(){
  var id=$(this).data('invoice-id');
  var list_amount=$('#invoice-table-'+id).find('.list-amount').text();
  var number_of_years=$('#invoice-table-'+id).find('.number-of-years').text();
  var membership_start=$('#invoice-table-'+id).find('.membership-start').text();
  var membership_end=$('#invoice-table-'+id).find('.membership-end').text();
  var paid_amount=$('#invoice-table-'+id).find('.paid-amount').text();
  var due_amount=$('#invoice-table-'+id).find('.due-amount').text();
  
  $('#invoice-edit-form').find('#due-amount').val(due_amount);
  $('#invoice-edit-form').find('#list-amount').val(list_amount);
  $('#invoice-edit-form').find('#invoice-id').val(id);
  $('#invoice-edit-form').find('#paid-amount').val(paid_amount);
  $('#invoice-edit-form').find('#membership-start').val(membership_start);
  $('#invoice-edit-form').find('#membership-end').val(membership_end);
  $('#invoice-edit-form').find('#number-of-years').val(number_of_years);
 
});

$('#invoice-edit-form').on('submit',function(e){
  e.preventDefault();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
  url: "/invoice/membership-invoice-update",
  method: "post",
  data:$("#invoice-edit-form").serialize(),
  success: function (invoice_data) {
    displayInvoice(invoice_data);
  }
});
});
/*---------------------------------edit invoice-end-------------------------------------- */
/* --------------------------------display invoice data after update-------------------------------------*/
 function displayInvoice(invoice_data){

   $('#invoice-table-'+invoice_data.id).find('.number-of-years').text(invoice_data.number_of_years);
   $('#invoice-table-'+invoice_data.id).find('.membership-start').text(invoice_data.membership_start);
   $('#invoice-table-'+invoice_data.id).find('.membership-end').text(invoice_data.membership_end);
   $('#invoice-table-'+invoice_data.id).find('.list-amount').text(invoice_data.list_amount);
   $('#invoice-table-'+invoice_data.id).find('.paid-amount').text(invoice_data.paid_amount);
   $('#invoice-table-'+invoice_data.id).find('.due-amount').text(invoice_data.due_amount);

    /* -------------------------------invoies items-----------------------------------------*/
   $('#invoice-table-'+invoice_data.id).find('.addons-paid-amount').text(invoice_data.paid_amount);
   $('#invoice-table-'+invoice_data.id).find('.addons-due-amount').text(invoice_data.due_amount);
 /* -------------------------------invoies items/-----------------------------------------*/
 }
/* --------------------------------display invoice data after update-//end------------------------------------*/

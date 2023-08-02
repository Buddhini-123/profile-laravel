/*=========================================================================================
    File Name: app-invoice.js
    Description: app-invoice Javascripts
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
   Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// ***********************************************************************************************************
$(function () {
  "use strict";

  var applyChangesBtn = $(".btn-apply-changes"),
      discount,
      tax1,
      tax2,
      discountInput,
      tax1Input,
      tax2Input,
      sourceItem = $(".source-item"),
      date = new Date(),
      datepicker = $(".date-picker"),
      dueDate = $(".due-date-picker"),
      select2 = $(".invoiceto"),
      countrySelect = $("#customer-country"),
      btnAddNewItem = $(".btn-add-new "),
      adminDetails = {
          "App Design": "Designed UI kit & app pages.",
          "App Customization": "Customization & Bug Fixes.",
          "ABC Template": "Bootstrap 4 admin template.",
          "App Development": "Native App Development.",
      },
      customerDetails = {
          shelby: {
              name: "udeshika",
              company: "Shelby Company Limited",
              address: "Small Heath, Birmingham",
              pincode: "B10 0HF",
              country: "UK",
              tel: "Tel: 718-986-6062",
              email: "peakyFBlinders@gmail.com",
          },
          hunters: {
              name: "tharindu",
              company: "Hunters Corp",
              address: "951  Red Hawk Road Minnesota,",
              pincode: "56222",
              country: "USA",
              tel: "Tel: 763-242-9206",
              email: "waywardSon@gmail.com",
          },
      };
  // *********************************************************

  // *********************************************************
  // init date picker
  if (datepicker.length) {
      datepicker.each(function () {
          $(this).flatpickr({
              defaultDate: date,
          });
      });
  }

  if (dueDate.length) {
      dueDate.flatpickr({
          defaultDate: new Date(date.getFullYear(), date.getMonth(), date.getDate() + 5),
      });
  }

  // Country Select2
  if (countrySelect.length) {
      countrySelect.select2({
          placeholder: "Select country",
          dropdownParent: countrySelect.parent(),
      });
  }

  // Close select2 on modal open
  $(document).on("click", ".add-new-customer", function () {
      select2.select2("close");
  });

  // Select2
  if (select2.length) {
      select2.select2({
          placeholder: "Select Customer",
          dropdownParent: $(".invoice-customer"),
      });

      select2.on("change", function () {
          var $this = $(this),
              renderDetails =
                  '<div class="customer-details mt-1">' +
                  '<p class="mb-25">' +
                  customerDetails[$this.val()].name +
                  "</p>" +
                  '<p class="mb-25">' +
                  customerDetails[$this.val()].company +
                  "</p>" +
                  '<p class="mb-25">' +
                  customerDetails[$this.val()].address +
                  "</p>" +
                  '<p class="mb-25">' +
                  customerDetails[$this.val()].country +
                  "</p>" +
                  '<p class="mb-0">' +
                  customerDetails[$this.val()].tel +
                  "</p>" +
                  '<p class="mb-0">' +
                  customerDetails[$this.val()].email +
                  "</p>" +
                  "</div>";
          $(".row-bill-to").find(".customer-details").remove();
          $(".row-bill-to").find(".col-bill-to").append(renderDetails);
      });

      select2.on("select2:open", function () {
          if (!$(document).find(".add-new-customer").length) {
              $(document)
                  .find(".select2-results__options")
                  .before(
                      '<div class="add-new-customer btn btn-flat-success cursor-pointer rounded-0 text-left mb-50 p-50 w-100" data-toggle="modal" data-target="#add-new-customer-sidebar">' +
                          feather.icons["plus"].toSvg({ class: "font-medium-1 mr-50" }) +
                          '<span class="align-middle">Add New Customer</span></div>'
                  );
          }
      });
  }

  // Repeater init
  if (sourceItem.length) {
      sourceItem.on("submit", function (e) {
          e.preventDefault();
      });
      sourceItem.repeater({
          show: function () {
              $(this).slideDown();
          },
          hide: function (e) {
              $(this).slideUp();
          },
      });
  }

  // Prevent dropdown from closing on tax change
  $(document).on("click", ".tax-select", function (e) {
      e.stopPropagation();
  });

  // On tax change update it's value value
  function updateValue(listener, el) {
      listener.closest(".repeater-wrapper").find(el).text(listener.val());
  }

  // Apply item changes btn
  if (applyChangesBtn.length) {
      $(document).on("click", ".btn-apply-changes", function (e) {
          var $this = $(this);
          tax1Input = $this.closest(".dropdown-menu").find("#tax-1-input");
          tax2Input = $this.closest(".dropdown-menu").find("#tax-2-input");
          discountInput = $this.closest(".dropdown-menu").find("#discount-input");
          tax1 = $this.closest(".repeater-wrapper").find(".tax-1");
          tax2 = $this.closest(".repeater-wrapper").find(".tax-2");
          discount = $(".discount");

          if (tax1Input.val() !== null) {
              updateValue(tax1Input, tax1);
          }

          if (tax2Input.val() !== null) {
              updateValue(tax2Input, tax2);
          }

          if (discountInput.val().length) {
              var finalValue = discountInput.val() <= 100 ? discountInput.val() : 100;
              $this
                  .closest(".repeater-wrapper")
                  .find(discount)
                  .text(finalValue + "%");
          }
      });
  }

  // Item details select onchange
  $(document).on("change", ".item-details", function () {
      var $this = $(this),
          value = adminDetails[$this.val()];
      if ($this.next("textarea").length) {
          $this.next("textarea").val(value);
      } else {
          $this.after('<textarea class="form-control mt-2" rows="2">' + value + "</textarea>");
      }
  });
  if (btnAddNewItem.length) {
      btnAddNewItem.on("click", function () {
          if (feather) {
              // featherSVG();

              feather.replace({ width: 14, height: 14 });
          }
      });
  }
  /* -----------------------------------------add new item-----------------------------------------------------*/
  $(document).on("change", "[data-action='new']", function (e) {
      var cost = $(this).find('input[name="group[new]cost"]').val();
      var qty = $(this).find('input[name="group[new]qty"]').val();
      var price = cost * qty;
      // var item_data = {};
      $(this).find('input[name="group[new]price"]').val(price);
      //   $('[name^="group[new]"]').each(function () {
      //     var item_name = $(this).attr("name");
      //     var ret = item_name.replace('group[new]', "");
      //     var newName1 = ret.replace(/[\[\]]+/g, "");
      //     var value = $('[name="' + item_name + '"]').val();

      //     item_data[newName1] = value;
      // });
      // save_invoice_itmes(item_data)
  });
  /* -----------------------------------------add new item-//----------------------------------------------------*/
  /* -----------------------------------------edi new item-----------------------------------------------------*/
  $(document).on("change", "[data-action='edit']", function (e) {
      var name = $(this).find(".addon-item").attr("name");
      var newName = name.replace("product", "");
      var item_data = {};

      var cost = $(this)
          .find('input[name="' + newName + 'cost"]')
          .val();
      var qty = $(this)
          .find('input[name="' + newName + 'qty"]')
          .val();

      var price = cost * qty;
      $(this)
          .find('input[name="' + newName + 'price"]')
          .val(price);
      $('[name^="' + newName + '"]').each(function () {
          var item_name = $(this).attr("name");
          var ret = item_name.replace(newName, "");
          var itemName = ret.replace(/[\[\]]+/g, "");
          var value = $('[name="' + item_name + '"]').val();
          if(value !=0 ){
            item_data[itemName] = value;
          }else{
            return false;
          }
          
      });
      save_invoice_itmes(item_data);
  });
  /* -----------------------------------------edit new item-//----------------------------------------------------*/
  /* -----------------------------------------save invoice item-----------------------------------------------------*/
  function save_invoice_itmes(item_data) {
      $.ajaxSetup({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
      });
      $.ajax({
          url: "/invoice/save-invoice-itmes",
          method: "post",
          data: { item_data },
          success: function (response) {
            load_invoice_itmes();
          },
          error: function (response) {},
      });
  }
  /* -----------------------------------------save invoice item---//--------------------------------------------------*/
  $(document).ready(function() {
    load_invoice_itmes();


});
   /* -----------------------------------------test---//--------------------------------------------------*/

    /* -----------------------------------------test---//--------------------------------------------------*/
  /* -----------------------------------------add new--------------------------------------------------*/
  $("#source-items-store").on("submit", function (e) {
     
      e.preventDefault();
      var cost = $(this).find('input[name="group[new]cost"]').val();
      var qty = $(this).find('input[name="group[new]qty"]').val();
      var price = cost * qty;
      var item_data = {};
      $(this).find('input[name="group[new]price"]').val(price);
      $('[name^="group[new]"]').each(function () {
          var item_name = $(this).attr("name");
          var ret = item_name.replace("group[new]", "");
          var itemName = ret.replace(/[\[\]]+/g, "");
          var value = $('[name="' + item_name + '"]').val();
          if(value != 0){
            item_data[itemName] = value;
          }else{
            return false;
          }
         
      });
      save_invoice_itmes(item_data);
      $("#source-items-store").trigger("reset"); /*-------==>payment form reset(clear all inputs)------*/
  });
  /* -----------------------------------------add new---//-----------------------------------------------*/
  $(document).on("click", "[data-action='delete']", function () {
      var membership_invoice_item_id = $(this).data("delete");
      if (confirm("Are you sure?")) {
          // your deletion code
      }

      $.ajaxSetup({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
      });
      $.ajax({
          type: "delete",
          url: "/invoice/invoice-items-delete",
          data: { membership_invoice_item_id: membership_invoice_item_id },

          success: function () {
              $(".repeater-wrapper-list").empty();
           
              load_invoice_itmes();
          },
      });
      return false;
  });
  /* -----------------------------------------loading items-------------------------------------------------*/
  function load_invoice_itmes(){
    
    
    var invoice_id = $('[name="membership_invoice_id"]').val();
   
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    
    $.ajax({
        url: "/invoice/load-invoice-itmes",
        method: "post",
        data: { invoice_id: invoice_id },
        success: function (response) {
            console.log(response[0]);
            $.each(response[0], function (key, value) {
                if (value.invoice_id) {
                    $(".repeater-wrapper-list").append(
                        '<div class="row" data-action="edit">' +
                            '<div class="col-12 d-flex product-details-border position-relative pr-0">' +
                            '<div class="row w-100 pr-lg-0 pr-1 py-2">' +
                            '<div class="col-lg-5 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">' +
                            '<p class="card-text col-title mb-md-50 mb-0">Item</p>' +
                            '<div class="form-group">' +
                            '<select name="group[' +
                            key +
                            ']product" value="' +
                            value.id +
                            '"class="js-organisations-data-ajax addon-item">' +
                            '<option value="">' +
                            value.title +
                            "</option>" +
                            "</select>" +
                            "</div>" +
                            '<textarea class="form-control mt-2" rows="1">Comments</textarea>' +
                            "</div>" +
                            '<div class="col-lg-3 col-12 my-lg-0 my-2">' +
                            '<p class="card-text col-title mb-md-2 mb-0">Cost</p>' +
                            '<input type="number" name="group[' +
                            key +
                            ']cost" class="form-control"  value="' +
                            value.price +
                            '" placeholder="" readonly/>' +
                            "</div>" +
                            '<div class="col-lg-2 col-12 my-lg-0 my-2">' +
                            '<p class="card-text col-title mb-md-2 mb-0">Qty</p>' +
                            '<input type="number" class="form-control" name="group[' +
                            key +
                            ']qty" value="' +
                            value.quantity +
                            '" placeholder="1" />' +
                            "</div>" +
                            '<div class="col-lg-2 col-12 mt-lg-0 mt-2">' +
                            '<p class="card-text col-title mb-md-50 mb-0">Price</p>' +
                            '<input type="number" class="form-control" name="group[' +
                            key +
                            ']price" value="' +
                            value.amount +
                            '" placeholder="1" readonly/>' +
                            "</div>" +
                            "</div>" +
                            '<input type="hidden" class="form-control item-table-id" name="group[' +
                            key +
                            ']item_table_id" value="' +
                            value.id +
                            '" >' +
                            '<input type="hidden" class="form-control" name="group[' +
                            key +
                            ']invoice_id" value="' +
                            value.invoice_id +
                            '" >' +
                            '<div class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25">' +
                            "<a>" +
                            '<i data-feather="x" class="cursor-pointer font-medium-3" data-action="delete" data-delete="' +
                            value.item_table_id +
                            '"></i>' +
                            "</a>" +
                            '<div class="dropdown">' +
                            '<i class="cursor-pointer more-options-dropdown mr-0" data-feather="settings" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </i>' +
                            '<div class="dropdown-menu dropdown-menu-right item-options-menu p-50" aria-labelledby="dropdownMenuButton">' +
                            '<div class="form-group">' +
                            '<label for="discount-input" class="form-label">Discount(%)</label>' +
                            '<input type="number" class="form-control" id="discount-input" />' +
                            "</div>" +
                            '<div class="form-row mt-50">' +
                            '<div class="form-group col-md-6">' +
                            '<label for="tax-1-input" class="form-label">Tax 1</label>' +
                            '<select name="tax-1-input" id="tax-1-input" class="form-control tax-select">' +
                            '<option value="0%" selected>0%</option>' +
                            '<option value="1%">1%</option>' +
                            '<option value="10%">10%</option>' +
                            '<option value="18%">18%</option>' +
                            '<option value="40%">40%</option>' +
                            "</select>" +
                            "</div>" +
                            '<div class="form-group col-md-6">' +
                            '<label for="tax-2-input" class="form-label">Tax 2</label>' +
                            '<select name="tax-2-input" id="tax-2-input" class="form-control tax-select">' +
                            '<option value="0%" selected>0%</option>' +
                            '<option value="1%">1%</option>' +
                            '<option value="10%">10%</option>' +
                            '<option value="18%">18%</option>' +
                            '<option value="40%">40%</option>' +
                            "</select>" +
                            "</div>" +
                            "</div>" +
                            '<div class="dropdown-divider my-1"></div>' +
                            '<div class="d-flex justify-content-between">' +
                            '<button type="button" class="btn btn-outline-primary btn-apply-changes">Apply</button>' +
                            '<button type="button" class="btn btn-outline-secondary">Cancel</button>' +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>"
                    );
                }
            });
            dataload();
        },
        error: function () {},
    });
} 
      // --------------------------------------
      /**-----term : The current search term in the search box.
    q : Contains the same contents as term.
    _type: A "request type". Will usually be query, but changes to query_append for paginated requests.
    page : The current page number to request. Only sent for paginated (infinite scrolling) searches.-----------------*/


  // --------------------------------------------------------------

  // -----------------------------------------------
  /* -----------------------------------------loading items-------------------------------------------------*/
  function dataload() {
      $(".js-organisations-data-ajax").select2({
          ajax: {
              url: "/invoice/addons-data-load",
              dataType: "json",
              delay: 250,
              method: "post",
              data: function (params) {
                  return {
                      q: params.term /*------==>search term----------------------*/,
                      page: params.page,
                  };
              },
              processResults: function (data, params) {
                  params.page = params.page || 1;

                  return {
                      results: data.items,
                      pagination: {
                          more: params.page * 10 < data.total_count,
                      },
                  };
              },
              cache: true,
          },
          placeholder: "Search for a user",
          minimumInputLength: 1,
          templateResult: formatRepo,
          templateSelection: formatRepoSelection,
      });

      function formatRepo(repo) {
          if (repo.loading) {
              return repo.text;
          }
          /*----------------------------------search result -------------------- */
          var $container = $("<div class='select2-result'>" + "<div class='select2-result-user__id'></div>" + "<div class='select2-result-user__name'></div>" + "</div>");

          $container.find(".select2-result-user__name").text(repo.title);

          /*----------------------------------search result -------------------- */

          return $container;
      }

      function formatRepoSelection(repo) {
          var price = repo.price;
          var key = null;
          setprice(price, key);

          return repo.title || repo.text;
      }
  }
  function setprice(price, key) {
      if (key == null) {
          $('input[name="group[new]cost"]').val(price);
      } else {
          $('input[name="group[' + key + ']cost"]').val(price);
      }
  }
  // ******************************
  var section = $("#section-block"),
      sectionBlockMultiple = $(".btn-section-block-multiple");

  sectionBlockMultiple.on("click", function () {
      section.block({
          message: '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',
          css: {
              backgroundColor: "transparent",
              color: "#fff",
              border: "0",
            
          },
          overlayCSS: {
              opacity: 0.5,
              width:  '80%',
              textAlign: 'center', 
          },
          timeout: 1000,
          onUnblock: function () {
              section.block({
                  message: '<p class="mb-0">Almost Done...</p>',
                  timeout: 1000,
                  css: {
                      backgroundColor: "transparent",
                      color: "#fff",
                      border: "0",
                      
                  },
                  overlayCSS: {
                      opacity: 0.25,
                      width:  '80%',
                      textAlign: 'center', 
                  },
                  onUnblock: function () {
                      section.block({
                          message: '<div class="mb-0">Success</div>',
                          timeout: 500,
                          css: {
                              backgroundColor: "transparent",
                              color: "green",
                              border: "0",
                           
                            
                          },
                          
                          overlayCSS: {
                              opacity: 0.25,
                              width:  '80%',
                              textAlign: 'center', 
                          },
                      });
                  },
              });
          },
      });
  });
});

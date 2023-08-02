/*=========================================================================================
    File Name: form-select2.js
    Description: Select2 is a jQuery-based replacement for select boxes.
    It supports searching, remote data sets, and pagination of results.
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
 
  'use strict';
  var selectIcons = $('.select-2'),
    select = $('.select2-icons'),
    maxLength = $('.max-length'),
    hideSearch = $('.hide-search'),
    selectArray = $('.select2-data-array'),
    selectAjax = $('.select2-data-ajax'),
    selectLg = $('.select2-size-lg'),
    selectSm = $('.select2-size-sm'),
    selectInModal = $('.select2InModal');

  select.each(function () {
    var $this = $(this); 
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
          width: "50%",
    templateSelection: iconFormat2,
    templateResult: iconFormat2,


      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // Select With Icon
  selectIcons.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      //dropdownAutoWidth: true,
      width: '100%',
    //  minimumResultsForSearch: Infinity,
     // dropdownParent: $this.parent(),
      templateResult: iconFormat,
      templateSelection: iconFormat,
      escapeMarkup: function (es) {
        return es;
      }
    });
  });

  selectArray.wrap('<div class="position-relative"></div>').select2({
    dropdownAutoWidth: true,
    dropdownParent: selectArray.parent(),
    width: '100%',
    data: data
  });


  selectAjax.each(function () {
    // Loading remote data
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   var $this = $(this);
    $this.wrap('<div class="position-relative"></div>').select2({
      dropdownAutoWidth: true,
      dropdownParent: selectAjax.parent(),
      width: '100%',
      
      ajax: {
        url: '/organisations/ajax-data-load',
        dataType: 'json',
        method: 'post',
        delay: 250,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          console.log(data);
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: params.page * 10 < data.total_count
            }
          };
        },
        cache: true
      },
      placeholder: 'Search for a repository',
      escapeMarkup: function (markup) {
        return markup;
      }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: formatRepo,
      templateSelection: formatRepoSelection
    }).on('select2:open', () => {

      var  markup_addnew =
      "<div class='select2-result-repository__statistics'>" +

      "<div class='select2-results__option select2-results__message add-new' data-action='new' data-input='"+$this.attr('name')+"'  data-toggle='modal' data-target='#xlarge'>"+feather.icons['plus-square'].toSvg({ class: 'mr-50' }) + " Create new " +

      
      '  </div>' + 
    '</div>';
      
      $(".select2-results:not(:has(.add-new))").append(markup_addnew);

      $("[data-action='new']").on('click',function(){
       
        });

    })
  });
 


 
  // Format icon
  function iconFormat(icon) {
    var originalOption = icon.element;
    if (!icon.id) {
      return icon.text;
    }

    var $icon = feather.icons[$(icon.element).data('icon')].toSvg() + icon.text;

    return $icon;
  }

  // Limiting the number of selections
  maxLength.wrap('<div class="position-relative"></div>').select2({
    dropdownAutoWidth: true,
    width: '100%',
    maximumSelectionLength: 2,
    dropdownParent: maxLength.parent(),
    placeholder: 'Select maximum 2 items'
  });

  // Hide Search Box
  hideSearch.select2({
    placeholder: 'Select an option',
    minimumResultsForSearch: Infinity
  });

  // Loading array data
  var data = [
    { id: 0, text: 'enhancement' },
    { id: 1, text: 'bug' },
    { id: 2, text: 'duplicate' },
    { id: 3, text: 'invalid' },
    { id: 4, text: 'wontfix' }
  ];
  function formatRepo(repo) {
    if (repo.loading) return repo.text;
 var markup =
      '<li class="select2-results__option select2-results__option--highlighted" '+
   '  id = "select2-country-result-k4ms-Afghanistan" role = "option" aria - selected="true" data - select2 - id="select2-country-result-k4ms-Afghanistan" >  ' +
 
      feather.icons['share-2'].toSvg({ class: 'mr-50' }) +' '+repo.account_name+
    '      </li>';
           return markup;
  }                                                                        
  function formatRepoSelection(repo) {
    if (repo.account_name)
      var txt = repo.account_name;
    else
      var txt = repo.text;
    return feather.icons['share-2'].toSvg({ class: 'mr-50' }) +' '+ txt;
  }
  function formatRepo2(repo) {
    if (repo.loading) return repo.text;

    var markup =
      "<div class='select2-result-repository clearfix'>" +
      "<div class='select2-result-repository__avatar'><img src='" +
      repo.owner.avatar_url +
      "' /></div>" +
      "<div class='select2-result-repository__meta'>" +
      "<div class='select2-result-repository__title'>" +
      repo.account_name +
      '</div>';

    if (repo.description) {
      markup += "<div class='select2-result-repository__description'>" + repo.description + '</div>';
    }

    markup +=
      "<div class='select2-result-repository__statistics'>" +
      "<div class='select2-result-repository__forks'>" +
      feather.icons['share-2'].toSvg({ class: 'mr-50' }) +
      repo.forks_count +
      ' Forks</div>' +
      "<div class='select2-result-repository__stargazers'>" +
      feather.icons['star'].toSvg({ class: 'mr-50' }) +
      repo.stargazers_count +
      ' Stars</div>' +
      "<div class='select2-result-repository__watchers'>" +
      feather.icons['eye'].toSvg({ class: 'mr-50' }) +
      repo.watchers_count +
      ' Watchers</div>' +
      '</div>' +
      '</div></div>';

    return markup;
  }



  // Sizing options

  // Large
  selectLg.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      dropdownAutoWidth: true,
      dropdownParent: $this.parent(),
      width: '100%',
      containerCssClass: 'select-lg'
    });
  });

  // Small
  selectSm.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      dropdownAutoWidth: true,
      dropdownParent: $this.parent(),
      width: '100%',
      containerCssClass: 'select-sm'
    });
  });

  $('#select2InModal').on('shown.bs.modal', function () {
    selectInModal.select2({
      placeholder: 'Select a state'
    });
  });
})(window, document, jQuery);


/**-----term : The current search term in the search box.
        q : Contains the same contents as term.
        _type: A "request type". Will usually be query, but changes to query_append for paginated requests.
        page : The current page number to request. Only sent for paginated (infinite scrolling) searches.-----------------*/

$(document).ready(function(){
 
 $(".js-organisations-data-ajax").select2({
    
    ajax: {
    url: '/membership/load-user-data',
      dataType: 'json',
      delay: 250,
      method: 'post',
      data: function (params) {
        return {
          q: params.term, /*------==>search term----------------------*/
          page: params.page
        };
       
      },
      processResults: function (data, params) {

        params.page = params.page || 1;
  
        return {
          results: data.items,
          pagination: {
            more: (params.page * 10) < data.total_count
          }
        };
      },
      cache: true
    },
    placeholder: 'Search for a user',
    minimumInputLength: 1,
    templateResult: formatRepo,
    templateSelection: formatRepoSelection
  });
  
  function formatRepo (repo) {
    if (repo.loading) {
      return repo.text;
    }
  /*----------------------------------search result -------------------- */
    var $container = $(
        "<div class='select2-result'>" +
            "<div class='select2-result-user__id'></div>" +
            "<div class='select2-result-user__name'></div>" +
            "<div class='select2-result-user__email'></div>" +
        "</div>"
    );
    $container.find(".select2-result-user__id").text('Id:-'+repo.id);
    $container.find(".select2-result-user__name").text('Name:-'+repo.first_name+' '+repo.second_name);
    $container.find(".select2-result-user__email").text('Email:-'+repo.email);
 /*----------------------------------search result -------------------- */
  
    return $container;
  }
  
  function formatRepoSelection (repo) {
    return repo.first_name||  repo.text;
  }
  
});
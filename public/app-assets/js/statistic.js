$(function (){
    $(document).on('click', '.save_statistic', function(e) {

        e.preventDefault();
        var form= $("#statistic");
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            beforeSend:function (){
                $(form).find('span.error-text').text('');
            },

            success:function (response) {
                if (response.status == 0) {
                    $.each(response.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    swal("Successfully Save Details");
                }
            }
        });
    });

    $("document").on("click","#deleteCompany",function(e){
        alert('l');

        if(!confirm("Do you really want to do this?")) {
            return false;
        }

        e.preventDefault();
        var id = $(this).data("id");
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;

        $.ajax(
            {
                url: url.href, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {
                    _token: token,
                    id: id
                },
                success: function (response){

                    $("#success").html(response.message)

                    swal("Deleted");
                }
            });
        return false;
    });

    $('.yearpicker').yearpicker({

        // Initial Year
        year: null,

        // Start Year
        startYear: null,

        // End Year
        endYear: null,

        // Element tag
        itemTag: 'li',

        // Default CSS classes
        selectedClass: 'selected',
        disabledClass: 'disabled',
        hideClass: 'hide',

        // Custom template
        template: `<div class="yearpicker-container">
              <div class="yearpicker-header">
                  <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                  <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                  <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
              </div>
              <div class="yearpicker-body">
                  <ul class="yearpicker-year" data-view="years">
                  </ul>
              </div>
          </div>
  `,

    });

    $('.yearpicker').yearpicker({

        onShow: null,
        onHide: null,
        onChange: function(value){}

    });
});

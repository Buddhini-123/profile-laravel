$(function () {

    //show();
    function show() {
        $.ajax({
            type: "GET",
            url: "/user-roles",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $.each(response, function (key, role) {
                    $('tbody').appendTo('#new');
                });

            }
        });
    }

    function newTable(data) {
        let $roles = data;
        $('tbody').html("");
        $.each(data, function (key, role) {
            $('tbody').append(role);
        });
    }

    $('[data-target="#editForm"]').click(function (e) {
       $roleid= $(this).attr("data-roleid");
       $rolename= $(this).attr("data-rolename");
        // alert($roleid); alert($rolename);

        $("#role-name").val($rolename);
    });


    $('#roles').on('submit', function (e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            type: "POST",
            contentType: false,
            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },
            success: function (data) {
                //console.log(data);
                if (data.status == 0) {
                    $.each(data.error, function (prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                } else {

                     $("#roles").trigger("reset");
                     swal("Successfully Added Role");

                    console.log(data);


                    var html = '<tbody id="new">' +
                        '<tr>' +
                        '<td>' +
                        '<img src="app-assets/images/icons/angular.svg" class="mr-75" height="20" width="20" alt="Angular">' +
                        '<span class="font-weight-bold">'+data.name+' </span>' +
                        '</td>' +

                        '<td>' +
                        '<div class="avatar-group">' +
                        '<div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Lilian Nenez">' +
                        ' <img src="app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26">' +
                        '  </div>' +

                        '    </div>' +
                        '  </td>' +
                        ' <td><span class="badge badge-pill badge-light-primary mr-1">Active</span>' +
                        '  </td>' +
                        '  <td>' +
                        '   <div class="dropdown">' +
                        '   <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown">' +
                        '    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>' +
                        '   </button>' +
                        '   <div class="dropdown-menu">' +
                        '     <a class="open-myModal1 dropdown-item" data-toggle="modal" data-target="#editForm" href="/editrole/6">' +
                        '       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>' +
                        '       <span>Edit</span>' +
                        '   </a>' +
                        '   <a class="dropdown-item" value="" href="/delete-role/6">' +
                        '       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>' +
                        '       <span>Delete</span>' +
                        '   </a>' +
                        '   <a class="dropdown-item" data-toggle="modal" data-target="#inlineForm4" href="/alterrole/6">' +
                        '      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>' +
                        '   <span>Alter</span>' +
                        '   </a>' +
                        '   </div>' +
                        '  </div>' +
                        '   </td>' +
                        '  </tr> ' +







                        '</tbody>';


                    $("#role_table").append(html);
                }
            }
        });
    });

    $(document).on("click", "#update_data", function() {
        var url = "{{URL('role/'.$role->id)}}";
        var id=
            $.ajax({
                url: "/update-role",
                type: "PATCH",
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}',
                    type: 3,
                    name: $('#role-name').val(),
                    email: $('#guard_name').val(),
                },
                success: function(dataResult){
                    dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode)
                    {
                        window.location = "/user-roles";
                    }
                    else{
                        alert("Internal Server Error");
                    }

                }
            });
    });
});



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
                    $('tbody').appendTo('#new1');
                });

            }
        });
    }

    function newTable(data) {
        let $permissions = data;
        $('tbody').html("");
        $.each(data, function (key, permission) {
            $('tbody').append(permission);
        });
    }
        // edit permission. get data to the model
    $('[data-target="#editPermission"]').click(function (e) {
        $id= $(this).attr("data-id");
        $name= $(this).attr("data-name");
        $guard_name= $(this).attr("data-guard-name");

        $("#permission-id").val($id);
        $("#permission-guard-name").val($guard_name);
        $("#permission-name").val($name);
    });




    $('#permissions').on('submit', function (e) {
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

                    $("#permissions").trigger("reset");
                    swal("Successfully Added Permission");

                    //console.log(data);


                    var html = '<tbody id="new1">'+


                    '<tr>'+
                        '<td>'+data.name+' </td>' +
                        '<td>'+
                            '<div className="custom-control custom-checkbox">'+
                                '<input type="checkbox"'+
                                       'className="custom-control-input" id="admin-read"'+
                                       'name="admin-read"'+
                                       'checked/>'+
                                '<label className="custom-control-label"'+
                                       'htmlFor="admin-read"></label>'+
                            '</div>'+
                        '</td>'+
                        '<td>'+
                            '<div className="dropdown">'+
                                '<button type="button" className="btn btn-sm dropdown-toggle hide-arrow"'+
                                        'data-toggle="dropdown">'+
                                   ' <i data-feather="more-vertical"></i>'+
                                '</button>'+
                                '<div className="dropdown-menu">'+
                                    '<a className="open-myModal1 dropdown-item" data-toggle="modal"'+
                                       'data-target="#editPermission" href="/edit-permission/{{$permission->id}}"'+
                                       'data-id="{{$permission->id}}"'+
                                       'data-name="{{$permission->name}}" >'+
                                        '<i data-feather="edit-2" className="mr-50"></i>'+
                                        '<span>Edit</span>'+
                                    '</a>'+
                                    '<a className="dropdown-item" value=""'+
                                       'href="/delete-permission/{{$permission->id}}">'+
                                        '<i data-feather="trash" className="mr-50"></i>'+
                                        '<span>Delete</span>'+
                                   ' </a>'+
                                '</div>'+
                            '</div>'+
                        '</td>'+

                    '</tr>'+
                    '</tbody>';



                    $("#permission_table").append(html);
                }
            }
        });
    });
    $('#update-permission').on('submit', function (e) {     alert(form);
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

                    $("#permissions").trigger("reset");
                    swal("Successfully Added Permission");

                    console.log(data);

                    $('[data-tdpermission="' + data.permission.id + '"]').html(data.permission.name);
                    $('[class="close"]').click();

                }
            }
        });
    });
});



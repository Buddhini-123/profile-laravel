$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_name = '', filter_role = '', filter_plan = '')
    {
        var dataTable = $('#user_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('search.index') }}",
                data:{filter_name:filter_name, filter_role:filter_role,filter_plan:filter_plan }
            },
            columns: [
                {
                    data:'name',
                    name:'name'
                },
                {
                    data:'email',
                    name:'email'
                },
                {
                    data:'role',
                    name:'role'
                },
                {
                    data:'plan',
                    name:'plan'
                },
                {
                    data:'status',
                    name:'status'
                },
                {
                    data:'action',
                    name:'action'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_name = $('#filter_name').val();
        var filter_role = $('#filter_role').val();
        var filter_plan = $('#filter_plan').val();

        if(filter_name != '' &&  filter_name != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_name, filter_role, filter_plan);
        }
        else
        {
            alert('Select All filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_name').val('');
        $('#filter_role').val('');
        $('#filter_plan').val('');
        $('#user_data').DataTable().destroy();
        fill_datatable();
    });

});

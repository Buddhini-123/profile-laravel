$(function () {
    $("#selectMembership").change(function () {
        let $value;
        if (($(this).val() === "Associate")) {
            $value = $(this).val();
            //alert('k');
            var x = document.getElementById("selectMembership").value;
            $.ajax({
                url: "/user-view ",
                method: 'GET',
                data:{
                    id:x
                },
                success: function(data) {
                    $('#listdetails').html(data);
                    console.log(data);
                    alert('A');
                }
            });
        }
        else if (($(this).val() === "Organisational"))
        {
            $value = $(this).val();
            var x = document.getElementById("selectMembership").value;
            //alert('l');
            $.ajax({
                    url: "/user-view ",
                    method: 'GET',
                    data:{
                        id:x
                    },
                    success: function(data) {
                        $('#listdetails1').html(data);
                        //console.log(data);
                    }
                });
        }
        else
        {
            $value = $(this).val();
            var x = document.getElementById("selectMembership").value;
            $.ajax({
                url: "/user-view ",
                method: 'GET',
                data:{
                    id:x
                },
                success: function(data) {
                    $('#listdetails2').html(data);
                    //console.log(data);
                }
            });
        }

    });
});
//
//
// $(document).ready(function(){
//     function fill_datatable(selectMembership = '')
//     {
//         var dataTable = $('#customer_data').DataTable({
//             processing: true,
//             serverSide: true,
//             ajax:{
//                 url: "{{ route('customsearch.index') }}",
//                 data:{selectMembership:selectMembership}
//             },
//             columns: [
//                 {
//                     data:'label_eng',
//                     name:'label_eng'
//                 },
//                 {
//                     data:'price_1year',
//                     name:'price_1year'
//                 },
//                 {
//                     data:'price_2year',
//                     name:'price_2year'
//                 },
//                 {
//                     data:'price_3year',
//                     name:'price_3year'
//                 }
//             ]
//         });
//     }
//     fill_datatable();
//     $("#selectMembership").change(function () {
//         var selectMembership = $('#selectMembership').val();
//         if (($(this).val() === "Associate"))
//         {
//             $('#listdetails').DataTable().destroy();
//             fill_datatable(selectMembership);
//         }
//         else
//         {
//             $('#listdetails2').DataTable().destroy();
//             fill_datatable(selectMembership);
//         }
//
//     });
// });

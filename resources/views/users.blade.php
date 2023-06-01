@extends('include.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Users</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" style="width: 100% !important;" id="UsersTable">
                <thead>
                    <tr>
                        <th >Identity</th>
                        <th >Full Name</th>
                
                        <th> Gender</th>
                        <th >Block</th>
                
                    </tr>
                </thead>
                <tbody >

                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#UsersTable').dataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                "aaSorting": [[ 0, "desc" ]],
                'columnDefs': [{
                    'targets': [0,2], // column index (start from 0)
                     'orderable': false, 
            
                    /* column index */
                    // 'orderable': false,
                    /* true or false */
                }],
                'ajax': {
                    'url': '{{ route('fetchAllUsers') }}',
                    'data': function(data) {
               
                    }
                }
            });

            $(document).on("click", ".block", function(event) {

event.preventDefault();



swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("this user has blocked", {
                icon: "success",
            });

            if (user_type == "1") {
                var element = $(this).parent();

                var id = $(this).attr("rel");
                var delete_cat_url = "{{ route('blockUser', '') }}" + "/" + id;

                $.getJSON(delete_cat_url).done(function(data) {
                    console.log(data);
                    $('#UsersTable').DataTable().ajax.reload(null, false);
                });

                

            } else {
                iziToast.error({
                    title: 'Error!',
                    message: ' you are Tester ',
                    position: 'topRight'
                });
            }

        } else {
            swal("this user not block ");
        }
    });


});


$(document).on("click", ".unblock", function(event) {

event.preventDefault();



swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("this user has been unblocked", {
                icon: "success",
            });

            if (user_type == "1") {
                var element = $(this).parent();

                var id = $(this).attr("rel");
                var delete_cat_url = "{{ route('unblockUser', '') }}" + "/" + id;

                $.getJSON(delete_cat_url).done(function(data) {
                    console.log(data);
                    $('#UsersTable').DataTable().ajax.reload(null, false);
                });

                

            } else {
                iziToast.error({
                    title: 'Error!',
                    message: ' you are Tester ',
                    position: 'topRight'
                });
            }

        } else {
            swal("this user not unblock ");
        }
    });


});
    });
</script>
    
@endsection
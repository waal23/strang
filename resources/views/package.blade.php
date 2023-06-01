@extends('include.app')

@section('content')


<div class="text-right mb-3">
    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#addcat"  onclick="myFunction()">Add Package
    </a>
</div>


<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                    <h3>Add Package</h3>
                
                {{-- <h5 class="modal-title" id="exampleModalLongTitle"></h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                        <form action="" method="post" enctype="multipart/form-data" class="add_category" id="addForm" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label> Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label> Description</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label> Price</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>



                            <div class="form-group">
                                <label> Amount</label>
                                <input type="text" name="amount" class="form-control" required>
                            </div>
                     

                            
                            <div class="form-group">
                                <label> Playstore id</label>
                                <input type="text" name="playid" class="form-control" required>
                            </div>
                     
                            
                            <div class="form-group">
                                <label> Appstore id</label>
                                <input type="text" name="appid" class="form-control" required>
                            </div>
                     
                            <div class="form-group">
                                <input class="btn btn-primary mr-1" type="submit" id="addcat2" value="Add Package">
                            </div>

                        </form>


                    

            </div>

        </div>
    </div>
</div>






<div class="card">
    <div class="card-header">
        <h4>Package</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-22">
                <thead>
                    <tr>
                   
                        <th >Title</th>
                        <th >Description</th>
                        <th >price</th>
                        <th >Amount</th>
                        <th >App store id</th>
                        <th >Play store id</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody >

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="edit_cat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data"  id="edit_cat" autocomplete="off">

                    @csrf
                    <input type="hidden" class="form-control" id="editId" name="id" value="">
       
                    <div class="form-group">
                        <label> Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label> Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label> Price</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>



                    <div class="form-group">
                        <label> Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" required>
                    </div>
             

                    
                    <div class="form-group">
                        <label> Playstore id</label>
                        <input type="text" name="playid" id="playid" class="form-control" required>
                    </div>
             
                    
                    <div class="form-group">
                        <label> Appstore id</label>
                        <input type="text" name="appid" id="appid" class="form-control" required>
                    </div>
             

                    <div class="form-group">
                        <input type="submit" class=" btn btn-primary" id="editcat2">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<script>

function myFunction() {

    $('#addForm')[0].reset();

   
}



var user_type = {{session('user_type')}};


//<!-- edit category -->

$(document).ready(function() {

    $('#table-22').dataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                "aaSorting": [[ 0, "desc" ]],
                'columnDefs': [{
                    'targets': [0,1,2,],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                'ajax': {
                    'url': '{{ route('fetchAllPackage') }}',
                    'data': function(data) {
                        // console.log(data);
                        //$('#table-1').dataTable().draw();

                        // Read values
                        // var user_id = $('#user_id').val();

                        // Append to data
                        // data.user_id = user_id;
                    }
                }
            });

    
    $("#table-22").on("click",".edit_cats",function(event) {
        event.preventDefault();
        $('#edit_cat')[0].reset();
        var  id = $(this).attr('rel');
       
        $('#editId').val($(this).attr('rel'));
  
//   alert()

        var url = "{{route('getPackageById', '')}}"+"/"+id;
        $.getJSON(url).done(function(data) {
            console.log(data);

            $('#title').val(data.title);
            $('#appid').val(data.appid);
            $('#playid').val(data.playid);
            $('#amount').val(data.amount);
            $('#description').val(data.description);
            $('#price').val(data.price);
        });
        $('#edit_cat_modal').modal('show');
    });
});



$(document).ready(function() {
    $("#edit_cat").submit(function(event) {
        event.preventDefault();
        $('.loader').show();

        

        if (user_type == "1") {
            

            var formdata = new FormData($("#edit_cat")[0]);
            console.log(formdata);


            $.ajax({
                url: '{{ route('updatePackage')}}',
                type: 'POST',
                data: formdata,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                console.log(response);
                $('#table-22').DataTable().ajax.reload(null, false);
                 $('#edit_cat')[0].reset(); 
                $('.loader').hide();
                $('#edit_cat_modal').modal('hide');
       

                },
                error: function(err) {
                    console.log(err.status);

                }

            });


        } else {
            iziToast.error({
                title: 'Error!',
                message: ' you are Tester ',
                position: 'topRight'
            });
        }
    });
});


// <!-- add category -->



$("#addForm").submit(function(event) {
    event.preventDefault();
    $('.loader').show();


    if (user_type == "1") {

        var formdata = new FormData($("#addForm")[0]);
        console.log(formdata);


        $.ajax({
            url: '{{ route('addPackage')}}',
            type: 'POST',
            data: formdata,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response);
                $('#table-22').DataTable().ajax.reload(null, false);
                $('.loader').hide();
                $('#addcat').modal('hide');
                    $('#addForm')[0].reset(); 
           
                $('#cat_title').val('');
                $('.add_image5').val('');

            },
            error: function(err) {
                console.log(err);

            }

        });
    } else {
        iziToast.error({
            title: 'Error!',
            message: ' you are Tester ',
            position: 'topRight'
        });
    }

});


// <!-- delete category -->

$(document).ready(function() {

    $("#table-22").on("click",".delete-cat",function(event) {

        event.preventDefault();
        


        swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Your Package has Deleted", {
                        icon: "success",
                    });

                    if (user_type == "1") {
                        var element = $(this).parent();

                        var cat_id = $(this).attr("rel");
                        var delete_cat_url = "{{route('deletePackage', '')}}"+"/"+cat_id;
            
                        $.getJSON(delete_cat_url).done(function(data) {
                            console.log(data);
                            $('#table-22').DataTable().ajax.reload(null, false);
                        });

                        
                      
                    } else {
                        iziToast.error({
                            title: 'Error!',
                            message: ' you are Tester ',
                            position: 'topRight'
                        });
                    }

                } else {
                    swal("Your Package safe");
                }
            });


    });

});


// $('#addcat').on('hidden.bs.modal', function () {
//     $('#addcat #addForm')[0].reset();
//     });

    
</script>



@endsection

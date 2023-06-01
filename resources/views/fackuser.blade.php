@extends('include.app')
@section('content')


<div class="text-right">
  <button type="button " class="btn btn-primary mr-0" data-toggle="modal" data-target="#exampleModal" onclick="myFunction()">Add Fack User</button>
</div>


  <div class=" modal fade" id="exampleModal" tabindex="-1"
   role="dialog" aria-labelledby="Sign up view"  aria-hidden="true" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Add Fack User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="addFackuser" id="addFackuser" method="post" action="" enctype="multipart/form-data">
          

          @csrf
        



          <div class="form-group">
            <label>fullname</label>
            <input type="text" class="form-control" name="fullname" required>
          </div>

          <div class="form-group">
            <label>Location </label>
            <input type="text" class="form-control" name="location" required>
          </div>

           
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control"  name="gender" required>
              <option disabled selected value="">Select Gender</option>
              <option value="1">Male</option>
              <option value="0">Female</option>
          </select>
         
          </div>
          <div class="form-row mb-4">
            <img src="{{ asset('asset/image/default.png') }}" width="100%"  class="col-md-6" id="defaultimg" style="height: 150px !important;"  alt="">

            <video  width="100%"  class="col-md-6" style="height: 150px !important;"   type="video/ogg" id="videosrc2"  controls > 
             
            </video>

          </div>



          <div   class="form-row co-md-12 ">
             <div class="form-group col-md-6">
              <label>Image</label>
              <input type="file" class="form-control" name="image"   id="imagefile" required accept="image/x-png,image/gif,image/jpeg">
            </div>

            <div class="form-group col-md-6">
                <label>Video</label>
                <input type="file" class="form-control" name="video" id="videofile" required accept="video/mp4,video/x-m4v,video/*">
              </div>

            </div>              

            <div class="form-group ">
            
              <div class="">
                  <input class=" form-control bg-primary text-white" type="submit" id="addwp" name="submit" value="Add User">
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="card mt-3">
    <div class="card-header">
        <h4>Fack User</h4>
    </div>
  <div class="card-body">

      <div class="table-responsive">
          <table class="table table-striped" id="table-234">
              <thead>
                  <tr>
                      <th>Image</th>
                      <th>video</th>
              
                      <th>Fullname</th>
                      <th>Gender</th>
                      <th>Action</th>
                  
                  </tr>
              </thead>
              <tbody id="">

              </tbody>
          </table>
      </div>





  </div>
  
  
</div>


<div class=" modal fade" id="editwallpaper" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Edit Fack User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="addFackuser" id="editFackUser" method="post" action="" enctype="multipart/form-data">
          

          @csrf
        <input type="hidden" id="userid" name="id">
    
           

          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
          </div>

              <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
          </div>

          <div class="form-group ">
            <label>Select Gender</label>
            <select class="form-control" id="editgender" name="gender" required>
               

            </select>
        </div>


          <div  class="form-row mb-3">
            <img src="" id="editimage" height="150"  class="col-md-6" width="" alt="">

            <video  width="100%" height="150" id="editVideo"   class="col-md-6"  type="video/ogg" controls > 
            </video>
          </div>

          <div class="form-row">


             <div class="form-group col-md-6">
              <label>Image</label>
              <input type="file" class="form-control" name="image" id="editimagefile"  accept="image/x-png,image/gif,image/jpeg" >
            </div>

  


            <div class="form-group col-md-6">
                <label>video File</label>
                <input type="file"  class="form-control" id="edit_video" name="video"   accept="video/mp4,video/x-m4v,video/*">
              </div>
            </div>

            <div class="form-group ">
            
              <div class="">
                  <input class=" form-control bg-primary text-white" id="editwp" type="submit" name="submit" value="Edit User">
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" id="video_call_modal" role="dialog" aria-labelledby="Sign up view"  aria-hidden="true" data-keyboard="false" >
    <div class="modal-dialog ">

        

        <div class="modal-content">

            <div class="modal-body " id="modal-body">

                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                  </button>    

            <video  id="chat_video"  width="100%" height="500"  controls></video>
            </div>

        </div>
    </div>
</div>


<script>



function myFunction() {

$('#addFackuser')[0].reset();
$('#defaultimg').attr('src', '{{ asset('asset/image/default.png') }}');
$('#videosrc2').attr('src', '{{ asset('asset/image/default.png') }}');

}


$( document ).ready(function() {
  $("#exampleModal").on('hidden.bs.modal', function(e) {
    $('#videosrc2').attr('src', '{{ asset('asset/image/default.png') }}');
 });

 $("#editwallpaper").on('hidden.bs.modal', function(e) {
    $('#editVideo').attr('src', '{{ asset('asset/image/default.png') }}');
 });

});

     



            var imageInput = $("#imagefile");
            imageInput.change(function() {
                if (imageInput[0].files && imageInput[0].files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#defaultimg')
                            .attr('src', e.target.result)
                            ;
                    };
                    reader.readAsDataURL(imageInput[0].files[0]);
                    console.log(imageInput[0].files[0]);
                }
            })



          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e) {
                      $('#editimage').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }

          $("#editimagefile").change(function() {
              readURL(this);
          });

         var editvideofile = $("#edit_video");
            editvideofile.change(function() {
                if (editvideofile[0].files && editvideofile[0].files[0]) {
                    var reader = new FileReader();
                    var player = document.getElementById("editVideo");
                    reader.onload = function(e) {
                        $('#editVideo')
                            .attr('src', e.target.result);
                            player.load();
                            player.play();
                    };
                    reader.readAsDataURL(editvideofile[0].files[0]);
                    console.log(editvideofile[0].files[0]);
                }
            })


            var videofile = $("#videofile");
            videofile.change(function() {
                if (videofile[0].files && videofile[0].files[0]) {
                    var reader = new FileReader();
                    var player = document.getElementById("videosrc2");
                    reader.onload = function(e) {
                        $('#videosrc2')
                            .attr('src', e.target.result);
                            player.load();
                            player.play();
                    };
                    reader.readAsDataURL(videofile[0].files[0]);
                    console.log(videofile[0].files[0]);
                }
            })



 $( document ).ready(function() {



    $("#table-234").on("click",".video-btn",function() {
   
   var videoSrc = $(this).attr("data-src") ;
   var jj = `${videoSrc}`;
   $("#chat_video").attr("src",jj);
  $("#video_call_modal").modal({keyboard:false})
   $("#video_call_modal").modal('show')
 });
         
         
      $("#video_call_modal").on('hidden.bs.modal', function(e) {
             $("#video_call_modal video").attr("src", $("#video_call_modal video").attr("src"));
         });

      var user_type = {{session('user_type')}};
  


           


// ================================  add Wallpaper ===================================

              $("#addFackuser").submit(function(event) {

              $('.loader').show();

              event.preventDefault();
    
    
              if (user_type == "1") {
              var formdata = new FormData($("#addFackuser")[0]);
              console.log(formdata);

              $.ajax({
              url: "{{route('addFackuser')}}",
              type: 'POST',
              data: formdata,
              dataType: "json",
              contentType: false,
              cache: false,
              processData: false,
              success: function(response) {
                  console.log(response);
                  $('#table-234').DataTable().ajax.reload(null, false);
                  $('#addFackuser')[0].reset(); 
                  $('.loader').hide();
                $('#exampleModal').modal('hide');
            
                  

              },
              error: function(err) {
                  console.log(err);

              }

              });
              }else {
                $('.loader').hide();
                  iziToast.error({
                      title: 'Error!',
                      message: ' you are Tester ',
                      position: 'topRight'
                  });
              }

              });

// ================================  fecth Wallpaper ===================================


               $('#table-234').dataTable({  

                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                "order": [
                    [0, "desc"]
                ],
                'columnDefs': [{
                    'targets': [0],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                'ajax': {
                    'url': '{{ route('fetchAllFackuser') }}',
                    'data': function(data) {
                        //$('#table-1').dataTable().draw();

                        // Read values
                        // var user_id = $('#user_id').val();

                        // Append to data
                        // data.user_id = user_id;
                    }
                }

                
            });

// ================================  edit view Wallpaper ===================================


                      $("#table-234").on("click",".editWallpaper",function(event) {
                     
                       $('#editFackUser')[0].reset();
                      var wallpaperid = $(this).attr('rel');

                      var view_news_url = "{{route('getFackuserById', '')}}"+"/"+wallpaperid;


                      $.getJSON(view_news_url).done(function(data) {
                          console.log(data);
                          $('#editgender option').remove();

                              var data1 = data.data;
                     var option = `<option value="1" ${data1.gender == 1 ?
                                        "selected" : "" } >Male</option>`;
                    var option2 = `<option value="0" ${data1.gender == 0 ?
                                        "selected" : "" } >Female</option>`;



                    $('#editgender').append(option);
                    $('#editgender').append(option2);


                              $('#identity').val(data1.identity);
                              $('#gender').val(data1.gender);
                              $('#fullname').val(data1.fullname);
                              $('#location').val(data1.location);

                        

                        

                                $src = `{{env('image ')}}public/storage/${data1.image}`;
                                $('#editimage').attr('src',$src);


                                        var player = document.getElementById("editVideo");
                                        var video = `{{env('image')}}public/storage/${data1.video}`;
                                        $('#editVideo').attr('src', video);

                                        player.load();
                           

                             $('#userid').val(data1.id);
                                


                      });

                    });


        $("#editFackUser").submit(function(event) {
            
          $('.loader').show();

        event.preventDefault();


        if (user_type == "1") {
            

            var formdata = new FormData($("#editFackUser")[0]);
            console.log(formdata);


            $.ajax({
                url: '{{route('updateFackuser')}}',
                type: 'POST',
                data: formdata,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                console.log(response);
                $('#table-234').DataTable().ajax.reload(null, false);
                $('#editFackUser')[0].reset(); 
                $('.loader').hide();
                $('#editwallpaper').modal('hide');
            

                },
                error: function(err) {
                    console.log(err);

                }

            });


        } else {

            $('.loader').hide();
            iziToast.error({
                title: 'Error!',
                message: ' you are Tester ',
                position: 'topRight'
            });
        }

        
 });



 $("#table-234").on("click",".delete-wallpaper",function(event) {

event.preventDefault();



swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("This User has been Deleted", {
                icon: "success",
            });

            if (user_type == "1") {
                var element = $(this).parent();

                var id = $(this).attr("rel");
                var delete_cat_url = "{{route('deleteFackuser', '')}}"+"/"+id;
    
                $.getJSON(delete_cat_url).done(function(data) {
                    console.log(data);
                    
                $('#table-234').DataTable().ajax.reload(null, false);
                });

              
            } else {
                $('.loader').hide();
                iziToast.error({
                    title: 'Error!',
                    message: ' you are Tester ',
                    position: 'topRight'
                });
            }

        } else {
            swal("This User is safe");
        }
    });


});



});
</script>
@endsection
@extends('include.app')

@section('content')
  
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card bg-white">       
             <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                            <div class="card-content" style="">
                                <h5 class="">On/Off Fake Users System</h5>

                                <label class="switch ml-3">
                                    <input type="checkbox" name="featured"  value="1" id="featured" class="featured" >
                                    <span class="slider round" ></span>
                                </label>
                                
               
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
          $(document).on("change", ".featured", function(event) {

event.preventDefault();


swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal(" Add In Fack", {
                icon: "success",
            });

            if (user_type == "1") {



                $id = $(this).attr("rel");

                if ($(this).prop("checked") == true) {
                    swal(" Add In option", {
                        icon: "success",
                    });
                    $value = 1;
                } else {

                    swal(" remove In option", {
                        icon: "success",
                    });
                    console.log("Checkbox is unchecked.");
                    $value = 0;
                }
                $.post('{{ route('updateFake') }}', {
                    featured: $value
                    },
                    function(returnedData) {
                      
                      location.reload();
                    }).fail(function(error) {
                    console.log(error);
                });

            } else {
                iziToast.error({
                    title: 'Error!',
                    message: ' you are Tester ',
                    position: 'topRight'
                });
            }

        } else {
          
     
             if ($(this).prop("checked") == true) {
                $(this).prop('checked',false) 
                swal("not add in option");
                } else {
                    swal(" add in option");
                    $(this).prop('checked',true) 
                }
        }
    });


});
    </script>

    </div>
<div class="card  ">
    <div class="card-header">
        <h3>Other Setting</h3>
        <div class="border-bottom-0 border-dark border"></div>
    </div>
    <div class="card-body">

        <form Autocomplete="off" class="form-group form-border" action="" method="post" id="priceFrom">

            @csrf

            <div class="form-row ">

            <div class="form-group col-md-6">
                <label for="">Gender Match</label>
                <input type="text" class="form-control" name="gendermatch" id="gendermatch" required>
            </div>
            <div class="form-group  col-md-6">
                <label for=""> Both Match</label>
                <input type="text" class="form-control" name="bothmatch" id="bothmatch" required>
            </div>

            </div>

            <div class="form-row ">

                <div class="form-group col-md-6">
                    <label for=""> Registration coin  bonus </label>
                    <input type="number" class="form-control" name="defaultcoin" id="defaultcoin" required>
                </div>
                <div class="form-group  col-md-6">
                    <label for="">Fack Video Wait Time</label>
                    <input type="number" class="form-control" name="facktime" id="facktime" required>
                </div>
    
                </div>
                <div class="form-row ">

             <div class="form-group  col-md-6">
                <label for=""> Max Call Duration</label>
                <input type="text" class="form-control" name="maxcallduration" id="maxcallduration" required>
            </div>
                </div>
            <div class="form-group-submit">
                <button name="admob" class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>
</div>


<div class="card mt-3">
 
    <div class="card-body">
    

<div class="tab  " role="tabpanel">
    <ul class="nav nav-pills border-b mb-3  ml-0">

        <li role="presentation" class="nav-item"><a class="nav-link pointer active" href="#Section1"
                aria-controls="home" role="tab" data-toggle="tab">Android<span
                    class="badge badge-transparent total_open_complaint"></span></a>
        </li>

        <li role="presentation" class="nav-item"><a class="nav-link pointer" href="#Section2"
                role="tab" data-toggle="tab">Ios
                <span class="badge badge-transparent total_close_complaint"></span></a>
        </li>

    </ul>

     
    <div class="tab-content tabs" id="home"> 

 {{-- ========================================= section 1=============================================== --}}

        <div role="tabpanel" class="tab-pane active" id="Section1">


            <div class="card  ">
                <div class="card-header">
                    <h3>Admob</h3>
                    <div class="border-bottom-0 border-dark border"></div>
                </div>
                <div class="card-body">
            
                    <form Autocomplete="off" class="form-group form-border" action="" method="post" id="admob">
            
                        @csrf

                        <input type="hidden" id="admob_id" name="id" >
            
                        <div class="form-row ">
            
                        <div class="form-group col-md-6 d-none">
                            <label for="">Publisher Id</label>
                            <input type="text" class="form-control" name="publisher_id" id="publisher_id" required>
                        </div>
                        <div class="form-group  col-md-6  d-none">
                            <label for="">Admob App Id</label>
                            <input type="text" class="form-control" name="admob_app_id" id="admob_app_id" required>
                        </div>
            
                        </div>
            
                        <div class="form-row ">
            
                        <div class="form-group col-md-6">
                            <label for="">Banner Id</label>
                            <input type="text" class="form-control" name="banner_id" id="banner_id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Interstitial Id</label>
                            <input type="text" class="form-control" name="intersial_id" id="intersial_id" required>
                        </div>
            
                        </div>
            
                        <div class="form-row ">
            
                        <div class="form-group col-md-6">
                            <label for="">Native Id</label>
                            <input type="text" class="form-control" name="native_id" id="native_id" required>
                        </div>
                        <div class="form-group col-md-6  d-none">
                            <label for="">ReWarded Id</label>
                            <input type="text" class="form-control" name="rewarded_id" id="rewarded_id" required>
                        </div>
            
                        </div>
            
                        <div class="form-group-submit">
                            <button name="admob" class="btn btn-primary" type="submit">Submit</button>
                        </div>
            
                    </form>
            
                </div>
            </div>


            <div class="card ">
                <div class="card-header">
                    <h3>Other Setting</h3>
                    <div class="border-bottom-0 border-dark border"></div>
                </div>
                <div class="card-body">
                    <form Autocomplete="off" class="form-group form-border" action="" method="post" id="misc" required>
                        @csrf
                        <input type="hidden" id="misc_id" name="id" >
                        
                        <div class="form-row ">
            
                        <div class="form-group col-md-6">
                            <label for="">Privacy URl</label>
                            <input type="" class="form-control" name="privcy_url" id="privcy_url" required>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="">Terms And condition</label>
                            <input type="" class="form-control" name="terms" id="terms" required>
                        </div>
            
                        </div>
            
                        <div class="form-row d-none">
            
                        <div class="form-group col-md-6" >
                            <label for="">More Apps Url</label>
                            <input type="" class="form-control" name="more_app" id="more_app">
                        </div>

                        <div class="form-group col-md-6" >
                            <label for="">Google Play License Key</label>
                            <input type="" class="form-control" name="googleplaylicensekey" id="googleplaylicensekey">
                        </div>
            
                        </div>
            
                        <div class="form-group">
                            <input type="submit" class=" btn btn-primary" >
                        </div>
            
                    </form>
                </div>
            </div>
            
        
            
            

            
        </div>

 {{-- ========================================= section 2=============================================== --}}


 <div role="tabpanel" class="tab-pane " id="Section2">


    <div class="card  ">
        <div class="card-header">
            <h3>Admob</h3>
            <div class="border-bottom-0 border-dark border"></div>
        </div>
        <div class="card-body">
    
            <form Autocomplete="off" class="form-group form-border" action="" method="post" id="admob-ios">
    
                @csrf
                <input type="hidden" id="admob_id_ios" name="id" >
    
                <div class="form-row ">
    
                <div class="form-group col-md-6  d-none">
                    <label for="">Publisher Id</label>
                    <input type="text" class="form-control" name="publisher_id" id="publisher_id_ios" required>
                </div>
                <div class="form-group  col-md-6  d-none">
                    <label for="">Admob App Id</label>
                    <input type="text" class="form-control" name="admob_app_id" id="admob_app_id_ios" required>
                </div>
    
                </div>
    
                <div class="form-row ">
    
                <div class="form-group col-md-6">
                    <label for="">Banner Id</label>
                    <input type="text" class="form-control" name="banner_id" id="banner_id_ios" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Interstitial Id</label>
                    <input type="text" class="form-control" name="intersial_id" id="intersial_id_ios" required>
                </div>
    
                </div>
    
                <div class="form-row ">
    
                <div class="form-group col-md-6">
                    <label for="">Native Id</label>
                    <input type="text" class="form-control" name="native_id" id="native_id_ios" required>
                </div>
                <div class="form-group col-md-6  d-none">
                    <label for="">ReWarded Id</label>
                    <input type="text" class="form-control" name="rewarded_id" id="rewarded_id_ios" required>
                </div>
    
                </div>
    
                <div class="form-group-submit">
                    <button name="admob" class="btn btn-primary" type="submit">Submit</button>
                </div>
    
            </form>
    
        </div>
    </div>

    
    
    <div class="card ">
        <div class="card-header">
            <h3>Other Setting</h3>
            <div class="border-bottom-0 border-dark border"></div>
        </div>
        <div class="card-body">
            <form Autocomplete="off" class="form-group form-border" action="#" method="post" id="misc-ios" required>
                @csrf
                <input type="hidden" id="misc_id_ios" name="id" >
                <div class="form-row ">
    
                <div class="form-group col-md-6">
                    <label for="">Privacy URl</label>
                    <input type="" class="form-control" name="privcy_url" id="privcy_url_ios" required>
                </div>
                <div class="form-group col-md-6" >
                    <label for="">Terms And condition</label>
                    <input type="" class="form-control" name="terms" id="terms_ios" required>
                </div>
    
                </div>
    
                <div class="form-row d-none">
    
                <div class="form-group col-md-6" >
                    <label for="">More Apps Url</label>
                    <input type="" class="form-control" name="more_app" id="more_app_ios">
                </div>

                
                <div class="form-group col-md-6" >
                    <label for="">Google Play License Key</label>
                    <input type="" class="form-control" name="googleplaylicensekey" id="googleplaylicensekey_ios">
                </div>
    
    
                </div>
    
                <div class="form-group">
                    <input type="submit" class=" btn btn-primary" >
                </div>
    
            </form>
        </div>
    </div>
    
  
    

    
</div>


    </div>

</div>  

</div>
</div>






<script>

var user_type = {{session('user_type')}};

// admob fetch

$.getJSON("{{route('social')}}").done(function(data) {

console.log(data);

$.each(data.socials, function(index, social) {

    var id  = social.id;

    if(id == 1){
        $('#social_id').val(social.id);
     $('#twitter').val(social.twitter);
    $('#facebook').val(social.facebook);
    $('#you_tube').val(social.you_tube);
    $('#instagram').val(social.instagram);
    }
    else{
        $('#social_id_ios').val(social.id);
     $('#twitter_ios').val(social.twitter);
    $('#facebook_ios').val(social.facebook);
    $('#you_tube_ios').val(social.you_tube);
    $('#instagram_ios').val(social.instagram);

    }

   
});
});

$.getJSON("{{route('getGender')}}").done(function(data) {

console.log(data);
$('#gendermatch').val(data.gendermatch );
$('#bothmatch').val(data.bothmatch );
        $('#maxcallduration').val(data.maxcallduration);
        $('#facktime').val(data.facktime);
        $('#defaultcoin').val(data.defaultcoin);

        if(data.is_fack == 1){

            $('#featured').prop('checked',true) 
        }

});
$.getJSON("{{route('admob')}}").done(function(data) {

    console.log(data);



    $.each(data.admobs, function(index, admob) {

        var id  = admob.id;

        if(id == 1){
        $('#admob_id').val(admob.id);
        $('#publisher_id').val(admob.publisher_id);
        $('#rewarded_id').val(admob.rewarded_id);
        $('#admob_app_id').val(admob.admob_app_id);
        $('#native_id').val(admob.native_id);
        $('#banner_id').val(admob.banner_id);
        $('#intersial_id').val(admob.intersial_id);
        }else{
        $('#admob_id_ios').val(admob.id);
        $('#publisher_id_ios').val(admob.publisher_id);
        $('#rewarded_id_ios').val(admob.rewarded_id);
        $('#admob_app_id_ios').val(admob.admob_app_id);
        $('#native_id_ios').val(admob.native_id);
        $('#banner_id_ios').val(admob.banner_id);
        $('#intersial_id_ios').val(admob.intersial_id);
        }

    });
});

// admob fetch

$.getJSON("{{route('fb')}}").done(function(data) {

    console.log(data);

    $.each(data.fbs, function(index, fb) {

        
        var id  = fb.id;

        if(id == 1){

            $('#fb_id').val(fb.id);
        $('#fb_rewarded_id').val(fb.fb_rewarded_id);
        $('#fb_native_id').val(fb.fb_native_id);
        $('#fb_intersial_id').val(fb.fb_intersial_id);
        $('#fb_banner_id').val(fb.fb_banner_id);
        $('#facebook_app_id').val(fb.facebook_app_id);

        }else{
            $('#fb_id_ios').val(fb.id);
            $('#fb_rewarded_id_ios').val(fb.fb_rewarded_id);
        $('#fb_native_id_ios').val(fb.fb_native_id);
        $('#fb_intersial_id_ios').val(fb.fb_intersial_id);
        $('#fb_banner_id_ios').val(fb.fb_banner_id);
        $('#facebook_app_id_ios').val(fb.facebook_app_id);

        }

    });
});

//misc fetch

$.getJSON("{{route('misc')}}").done(function(data) {

    console.log(data);

    $.each(data.miscs, function(index, misc) {

        var id  = misc.id;

  if(id == 1){
        $('#misc_id').val(misc.id);

        $('#more_app').val(misc.more_app);
        $('#terms').val(misc.terms);
        $('#privcy_url').val(misc.privcy_url);
        $('#googleplaylicensekey').val(misc.googleplaylicensekey);
  }else{
    $('#misc_id_ios').val(misc.id);
    $('#more_app_ios').val(misc.more_app);
        $('#terms_ios').val(misc.terms);
        $('#privcy_url_ios').val(misc.privcy_url);
        $('#googleplaylicensekey_ios').val(misc.googleplaylicensekey);
  }

    });

});




$("#priceFrom").submit(function(event) {

event.preventDefault();
if (user_type == "1") {
    var formdata = new FormData($("#priceFrom")[0]);
    console.log(formdata);

    $.ajax({
        url: '{{route('updateGender')}}',
        type: 'POST',
        data: formdata,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            location.reload();

        },error:(e)=>{console.log(e)}
    });
} else {
    iziToast.error({
        title: 'Error!',
        message: ' you are Tester ',
        position: 'topRight'
    });
}


});
//update setting js

// admob upadte

$("#admob").submit(function(event) {

    event.preventDefault();
    if (user_type == "1") {
        var formdata = new FormData($("#admob")[0]);
        console.log(formdata);

        $.ajax({
            url: '{{route('admob')}}',
            type: 'POST',
            data: formdata,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                location.reload();

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

// fb upadte

$("#fb").submit(function(event) {

    event.preventDefault();
    if (user_type == "1") {
        var formdata = new FormData($("#fb")[0]);
        console.log(formdata);

        $.ajax({
            url: '{{route('fb')}}',
            type: 'POST',
            data: formdata,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                location.reload();

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


// misc upadte


$("#misc").submit(function(event) {

    event.preventDefault();
    if (user_type == "1") {
        var formdata = new FormData($("#misc")[0]);
        console.log(formdata);

        $.ajax({
            url: '{{route('misc')}}',
            type: 'POST',
            data: formdata,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                location.reload();

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

$("#social").submit(function(event) {

event.preventDefault();
if (user_type == "1") {
    var formdata = new FormData($("#social")[0]);
    console.log(formdata);

    $.ajax({
        url: '{{route('social')}}',
        type: 'POST',
        data: formdata,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            location.reload();

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

// admob upadte

$("#admob-ios").submit(function(event) {

event.preventDefault();
if (user_type == "1") {
    var formdata = new FormData($("#admob-ios")[0]);
    console.log(formdata);

    $.ajax({
        url: '{{route('admob')}}',
        type: 'POST',
        data: formdata,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
          
         $(".loader").show().delay(1000).fadeOut();

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

// fb upadte

$("#fb-ios").submit(function(event) {

event.preventDefault();
if (user_type == "1") {
    var formdata = new FormData($("#fb-ios")[0]);
    console.log(formdata);

    $.ajax({
        url: '{{route('fb')}}',
        type: 'POST',
        data: formdata,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
                     $(".loader").show().delay(1000).fadeOut();

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


// misc upadte


$("#misc-ios").submit(function(event) {

event.preventDefault();
if (user_type == "1") {
    var formdata = new FormData($("#misc-ios")[0]);
    console.log(formdata);

    $.ajax({
        url: '{{route('misc')}}',
        type: 'POST',
        data: formdata,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
                     $(".loader").show().delay(1000).fadeOut();

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

$("#social-ios").submit(function(event) {

event.preventDefault();
if (user_type == "1") {
var formdata = new FormData($("#social-ios")[0]);
console.log(formdata);

$.ajax({
    url: '{{route('social')}}',
    type: 'POST',
    data: formdata,
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
        console.log(data);
                 $(".loader").show().delay(1000).fadeOut();

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
</script>


@endsection
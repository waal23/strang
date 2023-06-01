@extends('include.app')

@section('content')






<?php 

use Illuminate\Support\Facades\DB;

$users =  DB::table('users')->count();
$report =  DB::table('report')->count();
$package =  DB::table('package')->count();
$fackusers =  DB::table('users')->where('is_fack',1)->count();
?>


<div class="row">

    
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card bg-white">       
             <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h3 class="">Users</h3>
                                <h4 class="mb-3 "><?php echo  $users;?></h4>
    
                                <a href="{{route('users')}}" class="badge text-white badge-success mb-3">View Details</a>
               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="asset/image/icons8-google-groups-512.png" alt="" height="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card bg-white">       
             <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h3 class="">Reports</h3>
                                <h4 class="mb-3 "><?php echo  $report;?></h4>
    
                                <a href="{{route('report')}}" class="badge text-white badge-success mb-3">View Details</a>
               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="asset/image/icons8-google-groups-512.png" alt="" height="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card bg-white">       
             <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                                <h3 class="">Packages</h3>
                                <h4 class="mb-3 "><?php echo  $package;?></h4>
    
                                <a href="{{route('package')}}" class="badge text-white badge-success mb-3">View Details</a>
               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                                <img src="asset/image/icons8-google-groups-512.png" alt="" height="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<div class="row">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card bg-white">       
         <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                            <h3 class="">Fack Users</h3>
                            <h4 class="mb-3 "><?php echo  $fackusers;?></h4>

                            <a href="{{route('fackuser')}}" class="badge text-white badge-success mb-3">View Details</a>
           
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                            <img src="asset/image/icons8-google-groups-512.png" alt="" height="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    function getAdmob()
    {
        $data['admobs'] = DB::table('admob')->get();
        echo json_encode($data);
    }

    function getFb()
    {
        $data['fbs'] = DB::table('facebook')->get();
        echo json_encode($data);
    }

    function getMisc()
    {
        $data['miscs'] = DB::table('misc')->get();
        echo json_encode($data);
    }

    function getSocial()
    {
        $data['socials'] = DB::table('social')->get();
        echo json_encode($data);
    }

    function getGender()
    {
        $data = DB::table('gender')->first();
        echo json_encode($data);
    }


    function updateAdmob(Request $req){

        $id = $req->id;


        $data  =   DB::table('admob')->where('id', $id)->update(['publisher_id' => $req->publisher_id,
                                                        'admob_app_id' => $req->admob_app_id,
                                                         'banner_id' => $req->banner_id,
                                                             'intersial_id' => $req->intersial_id,
                                                             'native_id' => $req->native_id,
                                                             'rewarded_id' => $req->rewarded_id
                                                             ]);
        echo json_encode($data);
    }

    function updateMisc(Request $req){

        $id = $req->id;
        $data  =   DB::table('misc')->where('id', $id)->update(['more_app' => $req->more_app,
                                                        'privcy_url' => $req->privcy_url,
                                                         'terms' => $req->terms,
                                                         'googleplaylicensekey' => $req->googleplaylicensekey
                                                         ]);
        echo json_encode($data);
    }

    function updateGender(Request $req){

        $data  =   DB::table('gender')->where('id', 1)->update(['gendermatch' => $req->gendermatch,'maxcallduration' => $req->maxcallduration ,'defaultcoin' => $req->defaultcoin,'facktime' => $req->facktime,'bothmatch' => $req->bothmatch]);
        echo json_encode($data);
    }

    function getSettingData(Request $req){


        
    if($req->has('type')){

        $type = $req->type;

    } else{
  
        return json_encode(['status'=>false ,'message'=>'type not found']);
    }
  

        $admobs = DB::table('admob')->where('type',$req->type)->first();
        $miscs = DB::table('misc')->where('type',$req->type)->first();
        $gender = DB::table('gender')->first();
    

        return json_encode(['status'=>true ,'message'=>'All Data Fetch Successfull','admobs'=> $admobs,'miscs'=> $miscs,'gender'=> $gender]);
    }

    function updateFake(Request $req){
    
     
        return DB::table('gender')->where('id', 1)->update(['is_fack' => $req->featured]);
      }
}

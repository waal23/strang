<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Facades\Auth;

use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use Illuminate\Support\Facades\DB;

include "./app/Class/AgoraDynamicKey/RtcTokenBuilder.php";


class UserController extends Controller
{

    public function blockUserForUser(Request $request){
        $rules = [
            'user_id' => 'required',
            'block_user_ids'=> 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'data' => $msg]);
        }

        $user = User::find($request->user_id);
        if($user ==  null){
            return json_encode(['status'=>false,'message'=>"User doesn't exists","user"=>$user]);
        }

        $user->blocked_users = $request->block_user_ids;
        $user->save();

        $idArray = explode(',', $request->block_user_ids);
        $last = last($idArray);

        $remoteUser = User::find($last);

        if($remoteUser->blocked_users == null){
            $ids = $user->id;
        }else{
            $ids = $remoteUser->blocked_users.','.$user->id;
        }
        $remoteUser->blocked_users = $ids;
        $remoteUser->save();

        return json_encode(['status'=>true,'message'=>"Block successfull", 'data'=> $remoteUser]);
    }

    public function token(Request $request)
    {

        $appID = $request->appid;
        $appCertificate =$request->appcertificate;
        $channelName = $request->channelName;
        $user = $request->username;

        $role = RtcTokenBuilder::RolePublisher;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        return json_encode(['status'=>true,'message'=>"fetch sussfull",'token'=>$token]);
    }

    function addCoins(Request $req){
        $rules = [
            'user_id' => 'required',
            'coin'=> 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'data' => $msg]);
        }


        User::where('id',$req->user_id)->increment('coin',$req->coin);

        return json_encode(['status'=>true ,'message'=>'increment Success']);
    }

    function removeCoins(Request $req){
        $rules = [
            'user_id' => 'required',
            'coin'=> 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }


        User::where('id',$req->user_id)->decrement('coin',$req->coin);

        return json_encode(['status'=>true ,'message'=>'decrement Success']);
    }
    function getUser(Request $req){



            $rules = [
                'identity' => 'required',
                'fullname'=> 'required'
            ];

            $validator = Validator::make($req->all(), $rules);
            if ($validator->fails()) {
                $messages = $validator->errors()->all();
                $msg = $messages[0];
                return response()->json(['status' => false, 'message' => $msg]);
            }

            $data = User::where('identity',$req->identity)->first();

            if($data == null){
                $userCoin = DB::table('gender')->first();
            $user = new User;

            if($req->has('location')){

                $user->location = $req->location;

            }

            $user->identity = $req->identity;
            $user->fullname = $req->fullname;
            $user->coin = $userCoin->defaultcoin;
            $user->save();
            $data =  User::latest()->first();
            return json_encode(['status'=>true,'new_user'=> true ,'message'=>'User Add Success','data'=> $data ]);

        }else{
            return json_encode(['status'=>false,'new_user'=> false ,'message'=>'User All Ready Exists','data'=> $data]);
        }


    }

    function editUser(Request $req){

        if($req->has('id')){

            $id = $req->id;

        } else{

            return json_encode(['status'=>false ,'message'=>'id not found']);
        }



        $user = User::find($id);

        if($req->has('image')){

            $path = $req->file('image')->store('uploads');

            $user->image = $path;
        }

        if($req->has('fullname')){
            $user->fullname = $req->fullname;
        }

             if($req->has('location')){

            $user->location = $req->location;

        }


      $result =  $user->save();

      if($result){
      return json_encode(['status'=>true ,'message'=>'upadte successfull','data'=>$user]);
      }

    }


    function searchCall(Request $req){

        if($req->has('id')){

            $id = $req->id;

        } else{

            return json_encode(['status'=>false ,'message'=>'id not found']);
        }

        if($req->has('token')){

            $token = $req->token;

        } else{

            return json_encode(['status'=>false ,'message'=>'token not found']);
        }

        if($req->has('gender_type')){

            $gender_type = $req->gender_type;

        } else{

            return json_encode(['status'=>false ,'message'=>'gender_type not found']);
        }


        $callerUser = User::find($id);
        // Getting blocked users IDs array
        if($callerUser == null){
            return json_encode(['status'=>false ,'message'=>'user not found !']);
        }

        if($callerUser->blocked_users != null){
           $notInString = $callerUser->blocked_users.",".$id;
        }else{
            $notInString = $id;
        }
        $notInArray = explode(',', $notInString);


        // return json_encode(['status'=>true ,'data'=>$notInArray]);


        if($req->gender_type == null){
                $result = User::whereNotIn('id',$notInArray)->where('is_search',1)->whereNotIn('token',[''])->count();

        }else{
                $result = User::whereNotIn('id',$notInArray)->where('is_search',1)->where('gender',$req->gender_type)->whereNotIn('token',[''])->count();

        }



         if($result < 1){

           User::where('id', $req->id)->update(['token' => $req->token,
            'is_search' => 1
            ]);

            $data = User::where('id',$id)->get();
            return json_encode(['status'=>true ,'message'=>'update success','data'=>$data]);

         }else{



        if($req->gender_type == null){

            $data1 = User::where('is_search',1)->whereNotIn('id',$notInArray)->whereNotIn('token',[''])->orderByRaw("RAND()")->limit(1)->first();


            $user_id = $data1->id;

          User::where('id', $user_id)->update([
            'is_search' => 2
           ]);

         User::where('id', $req->id)->update(['token' =>$data1->token,
           'is_search' => 2
           ]);

           $data = User::where('id',$user_id)->get();


            return json_encode(['status'=>true ,'message'=>'fetch success','data'=>$data]);
        }else{
            $data1 = User::where('gender',$req->gender_type)->where('is_search',1)->whereNotIn('id',$notInArray)->whereNotIn('token',[''])->orderByRaw("RAND()")->limit(1)->first();


            $user_id = $data1->id;

          User::where('id', $user_id)->update([
            'is_search' => 2
           ]);

         User::where('id', $req->id)->update(['token' =>$data1->token,
           'is_search' => 2
           ]);

           $data = User::where('id',$user_id)->get();


            return json_encode(['status'=>true ,'message'=>'fetch success','data'=>$data]);
        }


         }
    }


    function destroy(Request $req){


        $rules = [
            'id' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }

     $result =   User::where('id',$req->id)->update(['is_search'=>0]);
     if($result){
     return json_encode(['status'=>true ,'message'=>'destroy  successfull']);
     }

    }


    function getconnecteduser(Request $req ){

        $rules = [
            'token' => 'required',
            'id' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }

      $data =   User::where('token',$req->token)->whereNotIn('id',[$req->id])->first();

        return response()->json(['status' => false, 'data' => $data]);

    }


    function fetchAllUsers(Request $request){

        $totalData =  User::where('is_fack',0)->count();
        $rows = User::where('is_fack',0)->orderBy('id', 'DESC')->get();


        $result = $rows;

        $columns = array(
            0 => 'id',
            1 => 'fullname'
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $totalData = User::where('is_fack',0)->count();
        $totalFiltered = $totalData;
        if (empty($request->input('search.value'))) {
            $result = User::where('is_fack',0)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
            $result =  User::where('is_fack',0)->Where('fullname', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered =User::where('is_fack',0)->where('id', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->count();
        }
        $data = array();
        foreach ($result as $item) {
            $block = "";

         if($item->is_block == 0){
           $block  =  '<a class=" btn btn-primary text-white block" rel='.$item->id.' >Block</a>';
            }else{
                $block  =  '<a class=" btn btn-danger text-white unblock" rel='.$item->id.' >UnBlock</a>';
            }
            if($item->gender == 1){

                $gender = "Male";
              }else{
                $gender = "Female";
              }
            $data[] = array(



             '<p>'.$item->identity.' </p>',
             '<p>'.$item->fullname.'</p>',
             $gender,
             $block



            );
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => $totalFiltered,
            "data"            => $data
        );
        echo json_encode($json_data);
        exit();


    }

    function updateGender(Request $req){
        $rules = [
            'user_id' => 'required',
            'gender' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];

        }

         User::where('id', $req->user_id)->update(['gender' => $req->gender]);

        return response()->json(['status' => true, 'message' => "change successfully"]);
    }

    function removeUser(Request $req){

        $rules = [
            'user_id' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }
        $data =  User::where('id',$req->user_id);
        $data->delete();

        return json_encode(['status'=>true,'message'=>'delete successfull']);
     }


    function blockUser($id){
        User::where('id', $id)->update(['is_block' => 1]);

        return response()->json(['status' => true, 'message' => "change successfully"]);
    }

    function unblockUser($id){
        User::where('id', $id)->update(['is_block' => 0]);

        return response()->json(['status' => true, 'message' => "change successfully"]);
    }

    function addFackuser(Request $req){
        $user = new User;



        $token =  rand(10000000,99999999);
        $first = "FACKUSER";
        $first .= $token;

        $count = User::where('identity',$first)->count();

        while ($count >= 1) {
            $token = rand(10000000,99999999);
            $first = "FACKUSER";
            $first .=  $token;
            $count = User::where('identity',$first)->count();
          }

        $user->identity = $first;
        $user->fullname = $req->fullname;
        $user->location = $req->location;
        $user->is_fack = 1;
        $user->gender = $req->gender;


        $path = $req->file('image')->store('uploads');

        $videopath =  $req->file('video')->store('uploads');
        $user->image = $path ;
        $user->video = $videopath  ;
        $user->save();
        return json_encode(['status'=>true,'message'=>'User Add Success']);
    }


    function fetchAllFackuser(Request $request){


        $totalData =  User::where('is_fack',1)->count();
        $wallpaper =  User::where('is_fack',1)->get();

        $columns = array(
            0 => 'id',
            1 => 'fullname'
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $totalData = User::where('is_fack',1)->count();

        $totalFiltered = $totalData;

        if (empty($request->input('search.value'))) {
            $wallpaper = User::where('is_fack',1)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $wallpaper =   User::where('is_fack',1)->where('fullname', 'LIKE', "%{$search}%")->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = User::where('is_fack',1)
                ->where('fullname', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();

        foreach ($wallpaper as $item) {

            $url = asset('public/storage/' . $item->image);
            $videourl = asset('public/storage/' . $item->video);


  $action ='<a href="#" rel="'.$item->id.'" class = "btn btn-primary editWallpaper  mr-2" data-toggle="modal" data-target="#editwallpaper" > <i class="fas fa-edit"></i> </a><a rel = '.$item->id.' class = "btn btn-danger delete-wallpaper text-white" > <i class="fas fa-trash-alt"></i> </a>';


  if($item->gender == 1){

    $gender = "Male";
  }else{
    $gender = "Female";
  }
            $data[] = array(

              '<img src="'.$url.'" width="100" height="100">',
              '<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="'.$videourl.'" data-target="#video_call_modal"><i class="fas fa-video"></i></button>',
            //   $item->identity,
              $item->fullname,
              $gender,
             $action



            );
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => $totalFiltered,
            "data"            => $data
        );

        echo json_encode($json_data);
        exit();


    }

    function getFackuserById($id){
        $data =   User::where('id',$id)->first();

        return json_encode(['status'=>true,'message'=>'fecth successfull','data'=>$data]);
    }



    function updateFackuser(Request $req){


        $user =  User::find($req->id);

        if($req->image != ""){


        $path = $req->file('image')->store('uploads');

        $user->image = $path;

        }

        if($req->has('video')){

        if($req->video != ""){
            $pathvideo = $req->file('video')->store('uploads');

        $user->video = $pathvideo;

        }
    }



        $user->gender = $req->gender;
        $user->fullname = $req->fullname;
        $user->location = $req->location;

        $user->save();

       return json_encode(['status'=>true,'message'=>'update successfull']);



    }

    function deleteFackuser($id){

        $data =  User::where('id',$id);
        $data->delete();

        $data1['status'] = true;
        $data1['message'] = "delete successfull";

        echo json_encode($data1);

 }


 function getFackUser(){

    $data = User::where('is_fack',1)->orderBy('id','DESC')->get();

    return json_encode(['status'=>true,'message'=>'all data fetch successfull','data'=>$data]);
 }



}

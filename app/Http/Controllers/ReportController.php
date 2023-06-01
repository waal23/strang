<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ReportController extends Controller
{


    function addReport(Request $req){
        $rules = [
            'user_id' => 'required',
            'reason'=> 'required',
            'contact'=> 'required',
            'description'=> 'required',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }

             $report = new Report();

            $report->contact  = $req->contact ;
            $report->description = $req->description; 
            $report->user_id = $req->user_id;
            $report->reason = $req->reason;
            $report->save();
     
            return json_encode(['status'=>true,'message'=>' Add Successfully' ]);
    }

    function fetchAllReport(Request $request){

        $totalData =  Report::count();
        $rows = Report::orderBy('id', 'DESC')->with('user')->get();


        $result = $rows;

        $columns = array(
            0 => 'id',
            1 => 'reason'
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $totalData = Report::count();
        $totalFiltered = $totalData;
        if (empty($request->input('search.value'))) {
            $result = Report::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)->with('user')
                ->get();
        } else {
            $search = $request->input('search.value');
            $result =  Report::Where('reason', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)->with('user')
                ->get();
            $totalFiltered =Report::where('id', 'LIKE', "%{$search}%")
                ->orWhere('reason', 'LIKE', "%{$search}%")
                ->count();
        }
        $data = array();
        foreach ($result as $item) {
     
            $block = "";

            
         if($item->user->is_block == 0){
            $block  =  '<a class=" btn btn-primary text-white block" rel='.$item->user->id.' >Block</a>';
             }else{
                 $block  =  '<a class=" btn btn-danger text-white unblock" rel='.$item->user->id.' >UnBlock</a>'; 
             }

            $data[] = array(
             '<p>'.$item->user->fullname.' </p>',
             '<p>'.$item->reason.'</p>',
             '<p>'.$item->description.'</p>',
             '<p>'.$item->contact .'</p>',
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

}

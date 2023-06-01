<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(){

        return  view('login');
      }
    
      function checklogin(Request $req){
    
          $data = Admin::where('user_name', $req->user_name)->first();
          
          if($req->user_name == $data['user_name'] && $req->user_password == $data['user_password']  ){
    
            
              $req->session()->put('user_name',$data['user_name']);
              $req->session()->put('user_password',$data['user_password']);
              $req->session()->put('user_type',$data['user_type']);
              return  redirect('index');
              
          }else{
              return view('login.login');
          }
      }
    
      function logout(){
    
          session()->pull('user_name');
          session()->pull('user_password');
          session()->pull('user_type');
          return  redirect(url('/'));
      }
}

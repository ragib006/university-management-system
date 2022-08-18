<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
// use App\Addcategory;
use Illuminate\Support\Facades\Hash;
//use App\Order;
use Session;
session_start();

class AdminController extends Controller
{

public function admindashboard(){

  return view('vueadminmaster.admin_master');

}



}

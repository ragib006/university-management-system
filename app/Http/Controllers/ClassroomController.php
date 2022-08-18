<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use App\Classroom;
use DB;
use DateTime;
Use Image;


class ClassroomController extends Controller
{

//showallclassroom


public function showallclassroom(){

$showallclassroom = Classroom::get();


return response()->json([

'showallclassroom'=>$showallclassroom

],200);


}




//addclassroomformaction


public function addclassroomformaction(Request $request){

   $data = $request->all();

    $todaydate = date("d-m-Y");

   $ckeck = Classroom::where(['classroom_name'=>$data['classroom_name']])->first();


   if($ckeck){

        return 0;

   }else{

     $room = new Classroom;

     $room->classroom_name = $data['classroom_name'];
     $room->classroom_no = $data['classroom_no'];
     $room->classroom_flour = $data['classroom_flour'];
     $room->classroom_added_date = $todaydate;
     $room->save();

     return 1;


   }


}

//editclassroomplaceholdervalue


public function editclassroomplaceholdervalue($classroom_id){


   return Classroom::where(['classroom_id'=>$classroom_id])->first();


}

//updateclassroom

public function updateclassroom(Request $request,$classroom_id){


       $data = $request->all();

       Classroom::where(['classroom_id'=>$classroom_id])->update(['classroom_name'=>$data['classroom_name'],'classroom_no'=>$data['classroom_no'],'classroom_flour'=>$data['classroom_flour'],'classroom_added_date'=>$data['classroom_added_date']]);

       return 1;


}


}

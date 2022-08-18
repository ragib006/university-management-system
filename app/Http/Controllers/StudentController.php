<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use App\Level;
use App\Classroom;
use App\Batch;
use App\Transport;
use App\Addhall;
use App\Addhallroom;
use App\Addstudent;

use DB;
use DateTime;
Use Image;

class StudentController extends Controller
{



public function allstudentshow(){

$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')


         //  ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')



             ->get();

             return response()->json([

             'students'=>$students

            ],200);


}

//showalllevelstudentform

public function showalllevelstudentform(){

  return Level::where(['level_status'=>1])->get();


}

//showallbatchstudentform

public function showallbatchstudentform(){


  return Batch::where(['batch_added_status'=>1])->get();

}

//showallbusstudentform

public function showallbusstudentform(){

 return Transport::where(['bus_status'=>1])->get();

}
//showallhallroomstudentform

public function showallhallroomstudentform(){


  return Addhallroom::where(['hall_room_status'=>1])->get();


}

//showalldepartmentinaddstudentform

public function showalldepartmentinaddstudentform(){


  return Department::where(['department_added_date_status'=>1])->get();

}

//addstudentformaction


public function addstudentformaction(Request $request){

   $data = $request->all();

   $password = md5($request->student_password);
   $todaydate = date("d-m-Y");

  // $hallroominfo = Addhallroom::where(['hall_room_id'=>$data['student_hallroom_id']])->first();

  //// $hallroomtotalsit = $hallroominfo->hall_room_sit_number;
   ///$hallroomid = $hallroominfo->hall_room_id;
   //$howmanystuinroom = Addstudent::where(['student_hallroom_id'=>$hallroomid])->count('student_hallroom_id');


  //$businfo = Transport::where(['bus_id'=>$data['student_bus_id']])->first();
  //$bustotalsit = $businfo->bus_sit_number;
  //$busid = $businfo->bus_id;
  //$howmanystudentinbus = Addstudent::where(['student_bus_id'=>$busid])->count('student_bus_id');



    //return $room;
  //  return $hallroomtotalsit;






  $check = Addstudent::where(['student_department_id'=>$data['student_department_id'],'student_roll'=>$data['student_roll']])->first();


  if($check){

  return 0;


}else{

  

  

              $strpos = strpos($request->student_image, ';');
              $sub = substr($request->student_image,0,$strpos);
              $ex = explode('/',$sub)[1];
              $name = time().".".$ex;

              $img = Image::make($request->student_image)->resize(400,400);
              $upload_path = public_path()."/images/";

              $img->save($upload_path.$name);



      $student  = new Addstudent;
      $student->student_department_id = $data['student_department_id'];
      $student->student_level_id = $data['student_level_id'];
     // $student->student_hallroom_id = $data['student_hallroom_id'];
     // $student->student_bus_id = $data['student_bus_id'];
      $student->student_batch_id = $data['student_batch_id'];
      $student->student_name = $data['student_name'];
      $student->student_roll = $data['student_roll'];
      $student->student_email = $data['student_email'];
      $student->student_address = $data['student_address'];
      $student->student_district = $data['student_district'];
      $student->student_mobile_number = $data['student_mobile_number'];
      $student->student_father_name = $data['student_father_name'];
      $student->student_mother_name = $data['student_mother_name'];
      $student->student_father_mobile_number = $data['student_father_mobile_number'];
      $student->student_mother_mobile_number = $data['student_mother_mobile_number'];
      $student->student_image = $name;
      $student->student_description = $data['student_description'];
      $student->student_password = $password;
      $student->student_added_date =  $todaydate;
      $student->save();
      return 1;
     }











}

//activestudentunactive

public function activestudentunactive($student_id){


    Addstudent::where(['student_id'=>$student_id])->update(['student_status'=>0]);

    return 0;


}



public function unactivestudentactive($student_id){


    Addstudent::where(['student_id'=>$student_id])->update(['student_status'=>1]);

    return 1;


}

//delatestudent


public function delatestudent($student_id){

    Addstudent::where(['student_id'=>$student_id])->delete();


}


//editmystudentplaceholdervalue


public function editmystudentplaceholdervalue($student_id){


   return Addstudent::where(['student_id'=>$student_id])->first();


}

//updatestudent


public function updatestudent(Request $request,$student_id){



    $data = $request->all();

    $password = md5($request->student_password);


      $post = Addstudent::where(['student_id'=>$student_id])->first();

    if($request->student_image!=$post->student_image){

      $strpos = strpos($request->student_image, ';');
      $sub = substr($request->student_image,0,$strpos);
      $ex = explode('/',$sub)[1];
      $name = time().".".$ex;

      $img = Image::make($request->student_image)->resize(400,400);
      $upload_path = public_path()."/images/";
      //$upload_path = public_path('images/customer/large/');
       $image = $upload_path.$post->student_image;
      $img->save($upload_path.$name);



      if(file_exists($image)){

          @unlink($image);


      }


    }else{

    $name = $post->student_image;


    }

   Addstudent::where(['student_id'=>$student_id])->update(['student_department_id'=>$data['student_department_id'],'student_level_id'=>$data['student_level_id'],'student_batch_id'=>$data['student_batch_id'],'student_name'=>$data['student_name'],'student_roll'=>$data['student_roll'],
   'student_email'=>$data['student_email'],'student_address'=>$data['student_address'],'student_password'=>$password,'student_district'=>$data['student_district'],'student_image'=>$name,'student_mobile_number'=>$data['student_mobile_number'],'student_father_name'=>$data['student_father_name'],'student_mother_name'=>$data['student_mother_name'],'student_father_mobile_number'=>$data['student_father_mobile_number'],
   'student_mother_mobile_number'=>$data['student_mother_mobile_number'],'student_description'=>$data['student_description'],'student_added_date'=>$data['student_added_date']]);



  return 1;



}

//viewmystudentdetails


public function viewmystudentdetails($student_id){




  $student = DB::table('addstudents')

              ->join('departments','addstudents.student_department_id','=','departments.department_id')
              ->join('levels','addstudents.student_level_id','=','levels.level_id')
             // ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
              ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
              ->where('student_id',$student_id)
              ->first();

          //  $hallid = $student->myhall_id;

       //   $hallname = Addhall::where(['hall_id'=>$hallid])->first();


               return response()->json([

               'student'=>$student
             //  'hallname'=>$hallname

              ],200);



}

//mysearchstudent

public function mysearchstudent(){

  $search = \Request::get('s');
  $searchstudents = DB::table('addstudents')

              ->join('departments','addstudents.student_department_id','=','departments.department_id')
              ->join('levels','addstudents.student_level_id','=','levels.level_id')
              ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
              ->join('transports','addstudents.student_bus_id','=','transports.bus_id')
              ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

              ->where('student_name','LIKE',"%$search%")
              ->orWhere('student_email','LIKE',"%$search%")
              ->orWhere('department_name','LIKE',"%$search%")
              ->orWhere('batch_name','LIKE',"%$search%")
              ->orWhere('level_name','LIKE',"%$search%")
              ->orWhere('student_roll','LIKE',"%$search%")
              ->orWhere('student_mobile_number','LIKE',"%$search%")
              ->get();


              return response()->json([


              'searchstudents'=>$searchstudents

             ],200);


}



}

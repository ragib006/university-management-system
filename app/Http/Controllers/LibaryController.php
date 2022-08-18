<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use App\Level;
use App\Classroom;
use App\Batch;
use App\Addbus;
use App\Addhall;
use App\Addhallroom;
use App\Addstudent;
use App\Addlibarybook;
use App\Addstudenttakelibarybook;
use App\Libarybookfinetake;


use DateTimeZone;

// use data_default_timezone_set;





use DB;
use DateTime;
Use Image;
use Session;
session_start();

class LibaryController extends Controller
{

//displayalllibarybook

public function displayalllibarybook(){



    $mylibarybook = DB::table('addlibarybooks')

                ->join('departments','addlibarybooks.libary_book_department_id','=','departments.department_id')
                ->join('levels','addlibarybooks.libary_book_level_id','=','levels.level_id')

                ->get();



                 return response()->json([

                 'mylibarybook'=>$mylibarybook
                 // 'hallname'=>$hallname

                ],200);



}

//searchlibarybook

public function searchlibarybook(){

  $search = \Request::get('s');
  $searchlibarybook = DB::table('addlibarybooks')

  ->join('departments','addlibarybooks.libary_book_department_id','=','departments.department_id')
  ->join('levels','addlibarybooks.libary_book_level_id','=','levels.level_id')

              ->where('libary_book_name','LIKE',"%$search%")
              ->orWhere('department_name','LIKE',"%$search%")
              ->orWhere('level_name','LIKE',"%$search%")
              ->get();


              return response()->json([


              'searchlibarybook'=>$searchlibarybook

             ],200);


}

//addlibarybookformaction


public function addlibarybookformaction(Request $request){

   $data = $request->all();
   $todaydate = date("d-m-Y");



    $check = Addlibarybook::where(['libary_book_name'=>$data['libary_book_name'],'libary_book_department_id'=>$data['libary_book_department_id']])->first();


    if($check){


         return 0;


    }else{



                       $strpos = strpos($request->libary_book_image, ';');
                       $sub = substr($request->libary_book_image,0,$strpos);
                       $ex = explode('/',$sub)[1];
                       $name = time().".".$ex;

                       $img = Image::make($request->libary_book_image)->resize(400,400);
                       $upload_path = public_path()."/images/";

                       $img->save($upload_path.$name);



               $student  = new Addlibarybook;
               $student->libary_book_name = $data['libary_book_name'];
               $student->libary_book_department_id = $data['libary_book_department_id'];
               $student->libary_book_level_id = $data['libary_book_level_id'];
               $student->libary_book_qty = $data['libary_book_qty'];
               $student->libary_book_image = $name;


               $student->libary_book_added_date =  $todaydate;
               $student->save();
               return 1;


    }

}

//editlibarybookplaceholdervalue

public function editlibarybookplaceholdervalue($libary_book_id){


   return Addlibarybook::where(['libary_book_id'=>$libary_book_id])->first();


}


//updatelibarybook


public function updatelibarybook(Request $request,$libary_book_id){

  $data = $request->all();




    $post = Addlibarybook::where(['libary_book_id'=>$libary_book_id])->first();

  if($request->libary_book_image!=$post->libary_book_image){

    $strpos = strpos($request->libary_book_image, ';');
    $sub = substr($request->libary_book_image,0,$strpos);
    $ex = explode('/',$sub)[1];
    $name = time().".".$ex;

    $img = Image::make($request->libary_book_image)->resize(400,400);
    $upload_path = public_path()."/images/";
    //$upload_path = public_path('images/customer/large/');
     $image = $upload_path.$post->libary_book_image;
    $img->save($upload_path.$name);



    if(file_exists($image)){

        @unlink($image);


    }


  }else{

  $name = $post->libary_book_image;


  }

 Addlibarybook::where(['libary_book_id'=>$libary_book_id])->update(['libary_book_name'=>$data['libary_book_name'],'libary_book_department_id'=>$data['libary_book_department_id'],'libary_book_level_id'=>$data['libary_book_level_id'],'libary_book_qty'=>$data['libary_book_qty'],'libary_book_image'=>$name,'libary_book_added_date'=>$data['libary_book_added_date']]);



return 1;


}

//
//delatelibarybook

public function delatelibarybook($libary_book_id){

 Addlibarybook::where(['libary_book_id'=>$libary_book_id])->delete();

 return 1;


}

//addstudenttakelibarybookformaction

public function addstudenttakelibarybookformaction(Request $request,$libary_book_id){


   $data = $request->all();


   $check = Addstudent::where(['student_roll'=>$data['studenttake_libary_book_roll'],'student_department_id'=>$data['studenttake_libary_book_department'],'student_level_id'=>$data['studenttake_libary_book_level']])->first();

   $samebooknottake = Addstudenttakelibarybook::where(['studenttake_libary_book_roll'=>$data['studenttake_libary_book_roll'],'studenttake_libary_book_department'=>$data['studenttake_libary_book_department'],'studenttake_libary_book_level'=>$data['studenttake_libary_book_level'],'libary_book_my_id'=>$libary_book_id,'studenttake_libary_book_status'=>1])->first();

   $countbook  = Addstudenttakelibarybook::where(['studenttake_libary_book_roll'=>$data['studenttake_libary_book_roll'],'studenttake_libary_book_department'=>$data['studenttake_libary_book_department'],'studenttake_libary_book_level'=>$data['studenttake_libary_book_level'],'studenttake_libary_book_status'=>1])->count();


  // return $countbook;




   if($check){

         if($samebooknottake){


            return 10;

         }elseif($countbook == 3){



           return 11;

         }

         else{

           $takebook = new Addstudenttakelibarybook;
           $takebook->studenttake_libary_book_roll = $data['studenttake_libary_book_roll'];
           $takebook->libary_book_my_id = $libary_book_id;
           $takebook->studenttake_libary_book_department = $data['studenttake_libary_book_department'];
           $takebook->studenttake_libary_book_level = $data['studenttake_libary_book_level'];
           $takebook->studenttake_libary_book_take_date = $data['studenttake_libary_book_take_date'];
           $takebook->studenttake_libary_book_return_date = $data['studenttake_libary_book_return_date'];
           $takebook->save();
           return 1;



         }






  }else{


        return 0;


 }

}

//showstudentwhotakebook


public function showstudentwhotakebook($libary_book_id){


  $whichstudenttakethisbook = DB::table('addstudenttakelibarybooks')


  ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
  ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
  ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
  ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
  ->where('libary_book_my_id',$libary_book_id)
  ->where('studenttake_libary_book_status',1)
  ->get();


              return response()->json([


              'whichstudenttakethisbook'=>$whichstudenttakethisbook

             ],200);



}


//editstudenttkelibarybookplaceholdervalue

public function editstudenttkelibarybookplaceholdervalue($studenttake_libary_book_id){


     return Addstudenttakelibarybook::where(['studenttake_libary_book_id'=>$studenttake_libary_book_id])->first();




}


//updatestudenttakelibarybook


public function updatestudenttakelibarybook(Request $request,$studenttake_libary_book_id){

      $data = $request->all();


      $check = Addstudent::where(['student_roll'=>$data['studenttake_libary_book_roll'],'student_department_id'=>$data['studenttake_libary_book_department'],'student_level_id'=>$data['studenttake_libary_book_level']])->first();


       $info = Addstudenttakelibarybook::where(['studenttake_libary_book_id'=>$studenttake_libary_book_id])->first();

       $bookid = $info->libary_book_my_id;

       if($check){


         Addstudenttakelibarybook::where(['studenttake_libary_book_id'=>$studenttake_libary_book_id])->update(['studenttake_libary_book_roll'=>$data['studenttake_libary_book_roll'],'libary_book_my_id'=>$bookid,'studenttake_libary_book_department'=>$data['studenttake_libary_book_department'],'studenttake_libary_book_level'=>$data['studenttake_libary_book_level'],'studenttake_libary_book_take_date'=>$data['studenttake_libary_book_take_date'],
         'studenttake_libary_book_return_date'=>$data['studenttake_libary_book_return_date']]);

         return 1;




       }else{

          return 0;


       }



}



//viewstudenttakelibarybook


public function viewstudenttakelibarybook($studenttake_libary_book_id){


$studenttakebookinfo =   DB::table('addstudenttakelibarybooks')


  ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
  ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
  ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
  ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
  ->where('studenttake_libary_book_id',$studenttake_libary_book_id)
  ->first();











   $expiredate = $studenttakebookinfo->studenttake_libary_book_return_date;

  $today = date("d-m-Y");
  $datetime1 = new DateTime($expiredate);
  $datetime2 = new DateTime($today);
  $interval = $datetime1->diff($datetime2);
  $datedifference = $interval->format('%a');


  $mytoday  = strtotime($today);
  $myexpiredate = strtotime($expiredate);


  if($myexpiredate < $mytoday){

    $fine = (5*$datedifference);
    $day = $datedifference;
    $finestatus = 1;

  }else{

   $fine = 0;
   $day = 0;
   $finestatus = 0;


  }


    Session::put('fine',$fine);
    Session::put('day',$day);
    Session::put('finestatus',$finestatus);


   $mylibarybookfine = Session::get('fine');
   $mylibarybookfineday = Session::get('day');
   $mylibarybookfinestatus = Session::get('finestatus');


              return response()->json([


              'studenttakebookinfo'=>$studenttakebookinfo,
              'mylibarybookfine'=>$mylibarybookfine,
              'mylibarybookfineday'=>$mylibarybookfineday,
              'mylibarybookfinestatus'=>$mylibarybookfinestatus

             ],200);

}



//libartbookreturn

public function libartbookreturn(Request $request){


   $data = $request->all();

   $finestutakelibarybookid = $request->fine_stu_take_libary_book_id;


   $bookid = $request->stu_fine_libary_book_id;
   $studentroll = $request->stu_fine_libary_book_roll;
   $studentdepartment = $request->stu_fine_libary_book_department;
   $studentlevel = $request->stu_fine_libary_book_level;
   $takebookdate = $request->stu_fine_libary_book_take_date;
   $returnbookdate = $request->stu_fine_libary_book_return_date;



//$studentinfo = Addstudent::where(['student_roll'=>$studentroll,'student_level_id'=>$studentlevel,'student_department_id'=>$studentdepartment])->first();



//$studentinfoo = DB::table('addstudents')->where('student_roll',$studentroll)->first();

$studentinfo = Addstudent::where(['student_roll'=>$studentroll,'student_department_id'=>$studentdepartment])->first();


   $studentid = $studentinfo->student_id;

   $bookinfo = Addlibarybook::where(['libary_book_id'=>$bookid])->first();


  $today = date("d-m-Y");
  $datetime1 = new DateTime($returnbookdate);
  $datetime2 = new DateTime($today);
  $interval = $datetime1->diff($datetime2);
  $datedifference = $interval->format('%a');


  $mytoday  = strtotime($today);
  $myexpiredate = strtotime($returnbookdate);





     $data = $request->all();

   $finestutakelibarybookid = $request->fine_stu_take_libary_book_id;


   $bookid = $request->stu_fine_libary_book_id;
   $studentroll = $request->stu_fine_libary_book_roll;
   $studentdepartment = $request->stu_fine_libary_book_department;
   $studentlevel = $request->stu_fine_libary_book_level;
   $takebookdate = $request->stu_fine_libary_book_take_date;
   $returnbookdate = $request->stu_fine_libary_book_return_date;


   

 //  $studentinfo = Addstudent::where(['student_roll'=>$studentroll,'student_level_id'=>$studentlevel,'student_department_id'=>$studentdepartment])->first();

 $studentinfo = Addstudent::where(['student_roll'=>$studentroll,'student_department_id'=>$studentdepartment])->first();

   $studentid = $studentinfo->student_id;

   $bookinfo = Addlibarybook::where(['libary_book_id'=>$bookid])->first();


  $today = date("d-m-Y");
  $datetime1 = new DateTime($returnbookdate);
  $datetime2 = new DateTime($today);
  $interval = $datetime1->diff($datetime2);
  $datedifference = $interval->format('%a');


  $mytoday  = strtotime($today);
  $myexpiredate = strtotime($returnbookdate);

//return $studentid;


  if($myexpiredate < $mytoday){

      $fine = ($datedifference*5);

      $finebook = new Libarybookfinetake;
      $finebook->fine_stu_take_libary_book_id = $finestutakelibarybookid;
      $finebook->stu_fine_libary_book_id = $bookid;
      $finebook->stu_fine_libary_student_id = $studentid;



      $finebook->stu_fine_libary_book_roll = $studentroll;
      $finebook->stu_fine_libary_book_department = $studentdepartment;
      $finebook->stu_fine_libary_book_level = $studentlevel;
      $finebook->stu_fine_libary_book_money = $fine;
      $finebook->stu_fine_libary_book_total_day = $datedifference;
      $finebook->stu_fine_libary_book_take_date = $takebookdate;
      $finebook->stu_fine_libary_book_return_date = $returnbookdate;
      $finebook->libarybook_fine_taka_date = $today;
      $finebook->save();

      Addstudenttakelibarybook::where(['studenttake_libary_book_id'=>$finestutakelibarybookid])->update(['studenttake_libary_book_status'=>0]);

      return 1;


  }else{

      $fine = 0;
      $fineday = 0;


      $finebook = new Libarybookfinetake;
      $finebook->fine_stu_take_libary_book_id = $finestutakelibarybookid;
      $finebook->stu_fine_libary_book_id = $bookid;
        $finebook->stu_fine_libary_student_id = $studentid;


      $finebook->stu_fine_libary_book_roll = $studentroll;
      $finebook->stu_fine_libary_book_department = $studentdepartment;
      $finebook->stu_fine_libary_book_level = $studentlevel;



      $finebook->stu_fine_libary_book_money = $fine;
      $finebook->stu_fine_libary_book_total_day = $fineday;
      $finebook->stu_fine_libary_book_take_date = $takebookdate;
      $finebook->stu_fine_libary_book_return_date = $returnbookdate;
      $finebook->libarybook_fine_taka_date = $today;
      $finebook->save();

      Addstudenttakelibarybook::where(['studenttake_libary_book_id'=>$finestutakelibarybookid])->update(['studenttake_libary_book_status'=>0]);

      return 0;

  }

//return $studentid;


//return $stu;







}

//showallsuccessbook

public function showallsuccessbook(){


  $allsuccessbook = DB::table('addstudenttakelibarybooks')


  ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
  ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
  ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
  ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
  // ->where('libary_book_my_id',$libary_book_id)
  ->where('studenttake_libary_book_status',0)
  ->get();

              return response()->json([


              'allsuccessbook'=>$allsuccessbook

             ],200);



}


//viewstudentreturnsuccesslibarybook

public function viewstudentreturnsuccesslibarybook($studenttake_libary_book_id){




  $studenttakebookinfo =   DB::table('addstudenttakelibarybooks')


    ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
    ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
    ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
    ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
    ->where('studenttake_libary_book_id',$studenttake_libary_book_id)
    ->first();

    $sturoll = $studenttakebookinfo->studenttake_libary_book_roll;
    $studepartment = $studenttakebookinfo->studenttake_libary_book_department;
    $stulevel = $studenttakebookinfo->studenttake_libary_book_level;

    $studentinfo = Addstudent::where(['student_roll'=>$sturoll,'student_level_id'=>$stulevel,'student_department_id'=>$studepartment])->first();
    $studentid = $studentinfo->student_id;
    $bookid = $studenttakebookinfo->libary_book_my_id;

    $successbookinformation = Libarybookfinetake::where(['fine_stu_take_libary_book_id'=>$studenttake_libary_book_id,'stu_fine_libary_book_id'=>$bookid,'stu_fine_libary_student_id'=>$studentid])->first();




    // return $successbookinformation;


   return response()->json([


      'studenttakebookinfo'=>$studenttakebookinfo,
      'successbookinformation'=>$successbookinformation
    // 'mylibarybookfineday'=>$mylibarybookfineday,
    // 'mylibarybookfinestatus'=>$mylibarybookfinestatus

   ],200);






}



//showallpendingbook


public function showallpendingbook(){



    $allpendingbook = DB::table('addstudenttakelibarybooks')


    ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
    ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
    ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
    ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
    // ->where('libary_book_my_id',$libary_book_id)
    ->where('studenttake_libary_book_status',1)
    ->get();

  //  $date = date("D M d Y");


    $my = new DateTime('now',new DateTimeZone('Asia/Dhaka'));
    $date = $my->format('D M d Y');

    $bb = date_default_timezone_set("Asia/Dhaka");

        $rr = date("d-m-Y");
  //   $rr = $bb->format('D M d Y');

   //  $rr = date("h:i:sa");

                return response()->json([


                'allpendingbook'=>$allpendingbook,
                'today'=>$rr

               ],200);



}

//delatesuccesslibarybook

public function delatesuccesslibarybook($studenttake_libary_book_id){


Addstudenttakelibarybook::where(['studenttake_libary_book_id'=>$studenttake_libary_book_id])->delete();

return 1;


}



//showalllibarybookfinestudent

public function showalllibarybookfinestudent(){



    $alllibaryfinestudent = DB::table('libarybookfinetakes')

      ->join('addstudents','libarybookfinetakes.stu_fine_libary_book_roll','=','addstudents.student_roll')
      ->join('departments','libarybookfinetakes.stu_fine_libary_book_department','=','departments.department_id')
      ->join('levels','libarybookfinetakes.stu_fine_libary_book_level','=','levels.level_id')
      ->join('addlibarybooks','libarybookfinetakes.stu_fine_libary_book_id','=','addlibarybooks.libary_book_id')
      // ->where('stu_fine_libary_book_money','!=',0)->get();
      ->get();

      return response()->json([


      'alllibaryfinestudent'=>$alllibaryfinestudent


     ],200);



}

//delatefinebook
public function delatefinebook($libarybook_fine_taka_id){

  Libarybookfinetake::where(['libarybook_fine_taka_id'=>$libarybook_fine_taka_id])->delete();

  return 1;

}

//showalllibarybookstudenttake

public function showalllibarybookstudenttake($student_id){

    $studentinfo = Addstudent::where(['student_id'=>$student_id])->first();

    $studentroll = $studentinfo->student_roll;
    $studentlevel = $studentinfo->student_level_id;
    $studentdeprtment = $studentinfo->student_department_id;


    $allpendingbook = DB::table('addstudenttakelibarybooks')


    ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
    ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
    ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
    ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
    ->where('studenttake_libary_book_roll',$studentroll)
    // ->where('studenttake_libary_book_level',$studentlevel)
    ->where('studenttake_libary_book_department',$studentdeprtment)
    ->where('studenttake_libary_book_status',1)
    ->get();


    return response()->json([


    'allpendingbook'=>$allpendingbook
  //  'today'=>$rr

   ],200);



}


//viewstudenttakelibarybookandfine


public function viewstudenttakelibarybookandfine($studenttake_libary_book_id){



  $studenttakebookinfo = DB::table('addstudenttakelibarybooks')


    ->join('addstudents','addstudenttakelibarybooks.studenttake_libary_book_roll','=','addstudents.student_roll')
    ->join('departments','addstudenttakelibarybooks.studenttake_libary_book_department','=','departments.department_id')
    ->join('levels','addstudenttakelibarybooks.studenttake_libary_book_level','=','levels.level_id')
    ->join('addlibarybooks','addstudenttakelibarybooks.libary_book_my_id','=','addlibarybooks.libary_book_id')
    ->where('studenttake_libary_book_id',$studenttake_libary_book_id)
    ->first();











     $expiredate = $studenttakebookinfo->studenttake_libary_book_return_date;

    $today = date("d-m-Y");
    $datetime1 = new DateTime($expiredate);
    $datetime2 = new DateTime($today);
    $interval = $datetime1->diff($datetime2);
    $datedifference = $interval->format('%a');


    $mytoday  = strtotime($today);
    $myexpiredate = strtotime($expiredate);


    if($myexpiredate < $mytoday){

      $fine = (5*$datedifference);
      $day = $datedifference;
      $finestatus = 1;

    }else{

     $fine = 0;
     $day = 0;
     $finestatus = 0;


    }


      Session::put('fine',$fine);
      Session::put('day',$day);
      Session::put('finestatus',$finestatus);


     $mylibarybookfine = Session::get('fine');
     $mylibarybookfineday = Session::get('day');
     $mylibarybookfinestatus = Session::get('finestatus');


                return response()->json([


                'studenttakebookinfo'=>$studenttakebookinfo,
                'mylibarybookfine'=>$mylibarybookfine,
                'mylibarybookfineday'=>$mylibarybookfineday,
                'mylibarybookfinestatus'=>$mylibarybookfinestatus

               ],200);

  }








}

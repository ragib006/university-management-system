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
use App\Addstudentcourse;

use App\Studentctmarks;
use App\Addcourseattentdance;



use DB;
use DateTime;
Use Image;

class StudentctController extends Controller
{


//addctmarkformaction

public function addctmarkformaction(Request $request,$addstuent_courseid){


$courseinfo  = Addstudentcourse::where(['addstuent_courseid'=>$addstuent_courseid])->first();
$data = $request->all();

 $todaydate = date("d-m-Y");


$ctname = $request->ct_type_name;
$courseid = $courseinfo->semester_courseid;
$studentid = $courseinfo->course_stu_id;
$levelid =  $courseinfo->course_level_id;

$check = Studentctmarks::where(['ct_student_id'=>$studentid,'ct_student_course_id'=>$courseid,'ct_student_level_id'=>$levelid,'ct_type_name'=>$ctname])->first();

if($check){

  return 0;

}else{


  $addcourse = new Studentctmarks;
  $addcourse->ct_student_id = $studentid;
  $addcourse->ct_student_course_id = $courseid;
  $addcourse->ct_student_level_id = $levelid;

  $addcourse->ct_type_name = $data['ct_type_name'];
  $addcourse->ct_mark = $data['ct_mark'];

  $addcourse->ct_date = $todaydate;

  $addcourse->save();


return 1;



}


}

//showallctmartks

public function showallctmartks(Request $request,$addstuent_courseid){

$courseinfo = DB::table('addstudentcourses')

      ->join('addstudents','addstudentcourses.course_stu_id','=','addstudents.student_id')
      ->join('levels','addstudentcourses.course_level_id','=','levels.level_id')
      ->join('courses','addstudentcourses.semester_courseid','=','courses.course_id')
      ->where('addstuent_courseid',$addstuent_courseid)
      ->first();

$ctname = $request->ct_type_name;
$courseid = $courseinfo->semester_courseid;
$studentid = $courseinfo->course_stu_id;
$levelid =  $courseinfo->course_level_id;



$allctmarks = DB::table('studentctmarks')

           ->join('addstudents','studentctmarks.ct_student_id','=','addstudents.student_id')
            ->join('levels','studentctmarks.ct_student_level_id','=','levels.level_id')
            ->join('courses','studentctmarks.ct_student_course_id','=','courses.course_id')
            ->where('ct_student_id',$studentid)
            ->where('ct_student_course_id',$courseid)
            ->where('ct_student_level_id',$levelid)
            ->get();




            $ctcount = DB::table('studentctmarks')

                       ->join('addstudents','studentctmarks.ct_student_id','=','addstudents.student_id')
                        ->join('levels','studentctmarks.ct_student_level_id','=','levels.level_id')
                        ->join('courses','studentctmarks.ct_student_course_id','=','courses.course_id')
                        ->where('ct_student_id',$studentid)
                        ->where('ct_student_course_id',$courseid)
                        ->where('ct_student_level_id',$levelid)
                        ->count();


  if($ctcount===4){




            $firstct = $allctmarks[0]->ct_mark;
            $secondct = $allctmarks[1]->ct_mark;
            $thiredct = $allctmarks[2]->ct_mark;
            $fourthct = $allctmarks[3]->ct_mark;

            $numbers = array($firstct,$secondct,$thiredct,$fourthct);
                       rsort($numbers);


                   $toponesortctmark = $numbers[0];
                   $topsecondsortctmark = $numbers[1];
                   $topthirdsortctmark = $numbers[2];
                   $topfourthsortctmark = $numbers[3];


    $myctmark = ($toponesortctmark+$topsecondsortctmark+$topthirdsortctmark)/3;

    $averagectmark = number_format($myctmark,2);





  }else{


    $averagectmark = 0;


  }



//return $courseinfo;

//
//         $firstct = $allctmarks[0]->ct_mark;
//         $secondct = $allctmarks[1]->ct_mark;
//         $thiredct = $allctmarks[2]->ct_mark;
//         $fourthct = $allctmarks[3]->ct_mark;
//
//         $numbers = array($firstct,$secondct,$thiredct,$fourthct);
//                    rsort($numbers);
//
//
//                $toponesortctmark = $numbers[0];
//                $topsecondsortctmark = $numbers[1];
//                $topthirdsortctmark = $numbers[2];
//                $topfourthsortctmark = $numbers[3];
//
//
//   $myctmark = ($toponesortctmark+$topsecondsortctmark+$topthirdsortctmark)/3;
//
// $averagectmark = number_format($myctmark,2);
//


  //return $courseinfo;
               return response()->json([

                 'allctmarks'=>$allctmarks,
                'courseinfo'=>$courseinfo,
               'averagectmark'=>$averagectmark


              ],200);



}

//delate_ct_mark


public function delatectmark($ct_id){


 Studentctmarks::where(['ct_id'=>$ct_id])->delete();

 return 1;





}


}

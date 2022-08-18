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
use App\Addstudentcourse;

use App\Addcourseattentdance;



use App\Course;


use DateTimeZone;

use DB;
use DateTime;
Use Image;
use Session;
session_start();

class CourseController extends Controller
{


//showalllevelinaddcourseform


public function showalllevelinaddcourseform(){



   $allmylevel = Level::where(['level_status'=>1])->get();

   return $allmylevel;


}

//showallteacherinaddcourseform

public function showallteacherinaddcourseform(){


  $allmyteacher = Addteacher::where(['teacher_status'=>1])->get();

  return $allmyteacher;

}

//showalldepartmentinaddcourseform

public function showalldepartmentinaddcourseform(){



 $allmydepartment = Department::where(['department_added_date_status'=>1])->get();

 return $allmydepartment;


}

//showallclassroominaddcourseform

public function showallclassroominaddcourseform(){

  $allclassroom = Classroom::where(['classroom_status'=>1])->get();

  return $allclassroom;

}

//addcourseformaction

public function addcourseformaction(Request $request){

   $data = $request->all();

    $todaydate = date("d-m-Y");


    //return $data;

  $check = Course::where(['course_code'=>$data['course_code'],'dept_id'=>$data['dept_id']])->first();

  if($check){

   return 0;


 }else{

    $addcourse = new Course;
    $addcourse->lev_id = $data['lev_id'];
    $addcourse->dept_id = $data['dept_id'];
    // $addcourse->sem_id = $data['sem_id'];
    $addcourse->tec_id = $data['tec_id'];
    $addcourse->cls_room_id = $data['cls_room_id'];
    $addcourse->course_code = $data['course_code'];
    $addcourse->course_title = $data['course_title'];
    $addcourse->course_type = $data['course_type'];
    //$addcourse->crouse_group = $data['crouse_group'];
    $addcourse->course_class_number = $data['course_class_number'];
    $addcourse->course_credit  = $data['course_credit'];
    $addcourse->course_added_date = $todaydate;

    $addcourse->save();


return 1;





}



}

//displaymyallcourses

public function displaymyallcourses(){


  $mycourse = DB::table('courses')

              ->join('departments','courses.dept_id','=','departments.department_id')
              ->join('levels','courses.lev_id','=','levels.level_id')
              ->join('addteachers','courses.tec_id','=','addteachers.teacher_id')
              ->join('classrooms','courses.cls_room_id','=','classrooms.classroom_id')

              ->get();



                 return response()->json([

                 'mycourse'=>$mycourse

                ],200);


}


//viewcoursedetails


public function viewcoursedetails($course_id){


   $courseinformation = DB::table('courses')

               ->join('departments','courses.dept_id','=','departments.department_id')
               ->join('levels','courses.lev_id','=','levels.level_id')
               ->join('addteachers','courses.tec_id','=','addteachers.teacher_id')
               ->join('classrooms','courses.cls_room_id','=','classrooms.classroom_id')
               ->where('course_id',$course_id)
               ->first();


               return response()->json([

               'courseinformation'=>$courseinformation

              ],200);



}



//deletecourse

public function deletecourse($course_id){

   Course::where(['course_id'=>$course_id])->delete();
   return 1;


}

//editcourseplaceholdervalue

public function editcourseplaceholdervalue($course_id){


return Course::where(['course_id'=>$course_id])->first();

}

//updatecourseformaction


public function updatecourseformaction(Request $request,$course_id){

      $data = $request->all();
        $todaydate = date("d-m-Y");


      Course::where(['course_id'=>$course_id])->update(['lev_id'=>$data['lev_id'],'dept_id'=>$data['dept_id'],'tec_id'=>$data['tec_id'],'cls_room_id'=>$data['cls_room_id'],'course_code'=>$data['course_code'],'course_title'=>$data['course_title'],'course_type'=>$data['course_type'],
      'course_class_number'=>$data['course_class_number'],'course_credit'=>$data['course_credit'],'course_added_date'=>$todaydate]);

      return 1;




}


//showmystudentallcourse


public function showmystudentallcourse($student_id){

  $stuentinfo = Addstudent::where(['student_id'=>$student_id])->first();

  $studentdepartmentid = $stuentinfo->student_department_id;
  $studentlevelid = $stuentinfo->student_level_id;

  $studentinformation = DB::table('addstudents')

              ->join('levels','addstudents.student_level_id','=','levels.level_id')
              ->where('student_level_id',$studentlevelid)
              ->first();


  $departmentregularcourse = DB::table('courses')
  ->where('course_type','!=','Option-I-Thesis')
  ->where('course_type','!=','Option-II-Thesis')
  ->where('course_type','!=','Option-I-Thesis-Sessional')
  ->where('course_type','!=','Option-II-Thesis-Sessional')
  ->where('lev_id',$studentlevelid)
  ->where('dept_id',$studentdepartmentid)
  ->get();

   $thesisoptionI = DB::table('courses')
   ->where('course_type','Option-I-Thesis')
   ->where('lev_id',$studentlevelid)
   ->where('dept_id',$studentdepartmentid)
   ->get();


   $opsessionalI = DB::table('courses')
   ->where('course_type','Option-I-Thesis-Sessional')
   ->where('lev_id',$studentlevelid)
   ->where('dept_id',$studentdepartmentid)
   ->get();


   $thesisoptionII = DB::table('courses')
   ->where('course_type','Option-II-Thesis')
   ->where('lev_id',$studentlevelid)
   ->where('dept_id',$studentdepartmentid)
   ->get();


$thesisoptionIISessional = DB::table('courses')
   ->where('course_type','Option-II-Thesis-Sessional')
   ->where('lev_id',$studentlevelid)
   ->where('dept_id',$studentdepartmentid)
   ->get();



  return response()->json([

'opsessionalI'=>$opsessionalI,


   'departmentregularcourse'=>$departmentregularcourse,
   'thesisoptionI'=>$thesisoptionI,
   'thesisoptionII'=>$thesisoptionII,
  // 'Optionsessional'=>$Optionsessional,
  'thesisoptionIISessional'=>$thesisoptionIISessional,
  'studentinformation'=>$studentinformation


 ],200);



}


//myselectcourse

public function myselectcourse(Request $request,$student_id){


    //  $data = $request->all();
       $stuentinfo = Addstudent::where(['student_id'=>$student_id])->first();

       $courselevelid = $stuentinfo->student_level_id;
       $coursedepartmentid = $stuentinfo->student_department_id;

       $todaydate = date("d-m-Y");


       $courseid = $request->semester_courseid;

      // $coursecredit =





    foreach($courseid as $id){

       $data[]=[

        "course_stu_id"=>$student_id,
        "semester_courseid"=>$id,
        "course_level_id"=>$courselevelid,
        "stuentcourseadded_date"=>$todaydate
      //  "att_month"=>date("F")
       ];


      }



        $att=DB::table('addstudentcourses')->insert($data);


 return 1;







}


//displaymydptcourse

public function displaymydptcourse($student_id){


      $stuinfo = DB::table('addstudents')

        ->join('departments','addstudents.student_department_id','=','departments.department_id')
        ->join('levels','addstudents.student_level_id','=','levels.level_id')
        ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
        ->where('student_id',$student_id)
        ->first();


        $deprtmentid = $stuinfo->student_department_id;
        $levelid = $stuinfo->student_level_id;
        $batchid = $stuinfo->student_batch_id;




     $displaymydepartmentcourse = DB::table('addstudentcourses')
                 ->join('addstudents','addstudentcourses.course_stu_id','=','addstudents.student_id')
                 ->join('courses','addstudentcourses.semester_courseid','=','courses.course_id')
                 ->join('levels','addstudentcourses.course_level_id','=','levels.level_id')
                 // ->join('addteachers','courses.tec_id','=','addteachers.teacher_id')
                 // ->join('classrooms','courses.cls_room_id','=','classrooms.classroom_id')
                 ->where('course_stu_id',$student_id)
                 ->where('course_level_id',$levelid)
                 ->get();


              //return $courseinformation;


                 return response()->json([

                 'displaymydepartmentcourse'=>$displaymydepartmentcourse,
                 'stuinfo'=>$stuinfo

                ],200);


}


public function deletestudentdepartmentcourse($addstuent_courseid){


  Addstudentcourse::where(['addstuent_courseid'=>$addstuent_courseid])->delete();

  return 1;


}


//mycourseattendanceformaction


public function  mycourseattendanceformaction(Request $request,$course_id){

  //$data = $request->all();

  $courseinfo = DB::table('courses')

              ->join('departments','courses.dept_id','=','departments.department_id')
              ->join('levels','courses.lev_id','=','levels.level_id')
              ->where('course_id',$course_id)
              ->first();
   $coursedpt = $courseinfo->dept_id;
   $levelid = $courseinfo->lev_id;




  $studentid = $request->course_attent_studentid;

  $todaydate = date("d-m-Y");

  $month = date("M");

  $year = date("Y");



//   $check = Addcourseattentdance::where(['course_attent_course_id'=>$course_id,'course_attent_dpt_id'=>$coursedpt,'course_attent_level_id'=>$levelid,'course_attent_date'=>$todaydate])->first();


//   if($check){


    //  return 0;


//   }else{



         foreach($studentid as $id){

            $data[]=[

             "course_attent_course_id"=>$course_id,
             "course_attent_studentid"=>$id,
             "course_attent_dpt_id"=>$coursedpt,
             "course_attent_level_id"=>$levelid,
             "course_attent_date"=>$todaydate,
             "course_attent_year"=>$year,
             "course_attent_month"=>$month,
             "course_attent_pre_or_abs"=>1
           //  "att_month"=>date("F")
            ];


           }



             $att=DB::table('addcourseattentdances')->insert($data);


           return 1;





//   }




}


public function showallcourseattentdancetakerstudent($course_id){

      // $courseinfo = Course::where(['course_id'=>$course_id])->first();


      $courseinfo = DB::table('courses')

                  ->join('departments','courses.dept_id','=','departments.department_id')
                  ->join('levels','courses.lev_id','=','levels.level_id')
                  ->where('course_id',$course_id)
                  ->first();
       $coursedpt = $courseinfo->dept_id;
       $levelid = $courseinfo->lev_id;

    //   return $levelid;


       $studentcourse = DB::table('addstudents')

       ->join('departments','addstudents.student_department_id','=','departments.department_id')
       ->join('levels','addstudents.student_level_id','=','levels.level_id')
       ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
       ->where('student_department_id',$coursedpt)
       ->where('student_level_id',$levelid)
       ->where('student_status',1)
       ->get();




                        return response()->json([

                        'studentcourse'=>$studentcourse,
                        'courseinfo'=>$courseinfo
                      //  'stuinfo'=>$stuinfo

                       ],200);




}

//viewmycourseattentdance
public function viewmycourseattentdance($addstuent_courseid){


 $studentcourseinfo = DB::table('addstudentcourses')
              ->join('addstudents','addstudentcourses.course_stu_id','=','addstudents.student_id')
              ->join('courses','addstudentcourses.semester_courseid','=','courses.course_id')
              ->join('levels','addstudentcourses.course_level_id','=','levels.level_id')
              ->where('addstuent_courseid',$addstuent_courseid)
              ->first();


 //$studentcourseinfo = Addstudentcourse::where(['addstuent_courseid'=>$addstuent_courseid])->first();

 $courseid = $studentcourseinfo->semester_courseid;
 $studentid = $studentcourseinfo->course_stu_id;
 $levelid = $studentcourseinfo->course_level_id;
 $totalclass = $studentcourseinfo->course_class_number;


 $allpresentattentdance = DB::table('addcourseattentdances')
             ->join('addstudents','addcourseattentdances.course_attent_studentid','=','addstudents.student_id')

             ->join('levels','addcourseattentdances.course_attent_level_id','=','levels.level_id')

             ->join('departments','addcourseattentdances.course_attent_dpt_id','=','departments.department_id')



             ->where('course_attent_course_id',$courseid)
             ->where('course_attent_level_id',$levelid)
             ->where('course_attent_studentid',$studentid)
             ->get();

      $totalattentdance = DB::table('addcourseattentdances')

                  ->where('course_attent_course_id',$courseid)
                  ->where('course_attent_level_id',$levelid)
                  ->where('course_attent_studentid',$studentid)
                  ->count('course_attent_pre_or_abs');

      $parcentage= (100 * $totalattentdance)/$totalclass;

      $attentdanceparcentage = number_format($parcentage,2);



      $mark  = (10 * $totalattentdance)/$totalclass;

      $attentdancemark= number_format($mark,2);








             return response()->json([

             'allpresentattentdance'=>$allpresentattentdance,
             'studentcourseinfo'=>$studentcourseinfo,
             'totalattentdance'=>$totalattentdance,
             'attentdanceparcentage'=>$attentdanceparcentage,
             'attentdancemark'=>$attentdancemark
            // 'courseinfo'=>$courseinfo
           //  'stuinfo'=>$stuinfo

            ],200);

     //return  $allpresentattentdance;



}

//delatestudentpresentattentdance

public function delatestudentpresentattentdance($course_atten_id){


Addcourseattentdance::where(['course_atten_id'=>$course_atten_id])->delete();

return 1;




}




}

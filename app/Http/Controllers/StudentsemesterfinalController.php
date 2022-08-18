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
use App\Coursesemesterfinalmarks;
use App\Universitysemesterfinalresult;

use App\Course;
use App\Examination;




use DB;
use DateTime;
Use Image;

class StudentsemesterfinalController extends Controller
{






    public function addsemesterfinalmarkformaction(Request $request,$addstuent_courseid){

      $courseinfo  = DB::table('addstudentcourses')

            ->join('addstudents','addstudentcourses.course_stu_id','=','addstudents.student_id')
            ->join('levels','addstudentcourses.course_level_id','=','levels.level_id')
            ->join('courses','addstudentcourses.semester_courseid','=','courses.course_id')
            ->where('addstuent_courseid',$addstuent_courseid)
            ->first();




      $data = $request->all();
      $todaydate = date("d-m-Y");

      $finalmark = $request->semester_final_exam_mark;
      $courseid = $courseinfo->semester_courseid;
      $studentid = $courseinfo->course_stu_id;
      $levelid =  $courseinfo->course_level_id;

  











     $mycourse_cedit = $courseinfo->course_credit;


      $coursecredit =  $courseinfo->course_credit;



      $my_course_credit = number_format($mycourse_cedit,2);



       $totalclass = $courseinfo->course_class_number;

       $studentinformation = Addstudent::where(['student_id'=>$studentid])->first();

       $deptid = $studentinformation->student_department_id;

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





    $checkthissemesterfinal = Coursesemesterfinalmarks::where(['semester_final_student_id'=>$studentid,'semester_final_course_id'=>$courseid,'semester_final_level_id'=>$levelid])->first();


    if($checkthissemesterfinal){


          return 11;


    }else{


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


                          return 12;

                     }

                     $totalattentdance = DB::table('addcourseattentdances')

                            ->where('course_attent_course_id',$courseid)
                            ->where('course_attent_level_id',$levelid)
                            ->where('course_attent_studentid',$studentid)
                            ->count('course_attent_pre_or_abs');



                  if($totalattentdance){


                    $parcentage= (100 * $totalattentdance)/$totalclass;

                    $attentdanceparcentage = number_format($parcentage,2);

                    $mark  = (10 * $totalattentdance)/$totalclass;

                    $attentdancemark = number_format($mark,2);


                  }else{

                   $attentdancemark = 0;

                  }


            $allmark = ($finalmark + $attentdancemark + $averagectmark);

         //   $totalmark = number_format($allmark,2);
            
            $totalmark = number_format($allmark);

          //  return $totalmark;


              if($totalmark>=80){


                    $greate = "A+";
                    $point = 4.00;
                    $greategunpoint = ($coursecredit * $point);


              }

              else if($totalmark>=75 && $totalmark<=79){

                     $greate = "A";
                     $point = 3.75;
                     $greategunpoint = ($coursecredit * $point);
                  

              }
              else if($totalmark>=70 && $totalmark<=74){

                      $greate = "A-";
                      $point = 3.50;
                      $greategunpoint = ($coursecredit * $point);
          

              }
              else if($totalmark>=65 && $totalmark<=69){

                      $greate = "B+";
                      $point = 3.25;
                      $greategunpoint = ($coursecredit * $point);
                  

              }

              else if($totalmark>=60 && $totalmark<=64){

                      $greate = "B";
                      $point = 3.00;
                      $greategunpoint = ($coursecredit * $point);
                  

              }

              else if($totalmark>=55 && $totalmark<=59){

                      $greate = "B-";
                      $point = 2.75;
                      $greategunpoint = ($coursecredit * $point);
                

              }

              else if($totalmark>=50 && $totalmark<=54){

                      $greate = "C+";
                      $point = 2.50;
                      $greategunpoint = ($coursecredit * $point);
                  

              }

              else if($totalmark>=45 && $totalmark<=50){

                      $greate = "C";
                      $point = 2.25;
                      $greategunpoint = ($coursecredit * $point);
            



              }

              else if($totalmark>=40 && $totalmark<=45){

                      $greate = "D";
                      $point = 2.25;
                      $greategunpoint = ($coursecredit * $point);
                    



              }
              else if($totalmark>=0 && $totalmark<=39){

                      $greate = "F";
                      $point = 0.00;
                      $greategunpoint = ($coursecredit * $point);
          



              }



              else{

                $greate = "F";
                $point = 0.00;
                $greategunpoint = ($coursecredit * $point);

              }





                $course = Course::where(['course_id'=>$courseid])->first();

                $course_cre_dit = $course->course_credit;


               $ragib_course_credit = number_format($course_cre_dit,2);;


               $multi = ($point * $coursecredit);
               $pointguncredit = number_format($multi,2);
               $mypoint = number_format($point,2);


                   $student  = new Coursesemesterfinalmarks;
                   $student->semester_final_student_id = $studentid;
                   $student->semester_final_course_id = $courseid;
                   $student->semester_final_level_id = $levelid;
                   $student->semester_final_exam_id = $request->semester_final_exam_id;
                   $student->semester_final_department_id = $deptid;
                   $student->semester_final_ct_mark = $averagectmark;
                   $student->semester_final_attentdance_mark = $attentdancemark;
                   $student->semester_final_exam_mark  = $finalmark;
                   $student->semester_final_total_course_mark = $totalmark;
                   $student->semester_final_course_grade = $greate;
                   $student->semester_final_course_cgpa = $mypoint;
                   $student->semester_final_course_credit = $course_cre_dit;
                    
             


                   

                   $student->semester_final_coursecredit_gun_course_cgpa = $pointguncredit;


                   $student->semester_final_added_date  = $todaydate;
                    $student->save();
                    return 1;

                  // return $totalmark;


            //   return $ragib_course_credit;


    }


    




     // return $courseinfo;




    }


//showsemesterfinalcoursemark

public function showsemesterfinalcoursemark($addstuent_courseid){

  $courseinfo = DB::table('addstudentcourses')

        ->join('addstudents','addstudentcourses.course_stu_id','=','addstudents.student_id')
        ->join('levels','addstudentcourses.course_level_id','=','levels.level_id')
        ->join('courses','addstudentcourses.semester_courseid','=','courses.course_id')
        ->where('addstuent_courseid',$addstuent_courseid)
        ->first();





    //    $finalmark = $request->semester_final_exam_mark;
        $courseid = $courseinfo->semester_courseid;
        $studentid = $courseinfo->course_stu_id;
        $levelid =  $courseinfo->course_level_id;
        $coursecredit =  $courseinfo->course_credit;





  // $totalcoursecreditinsemester =  DB::table('courses')

      //   ->join('levels','courses.lev_id','=','levels.level_id')
      //   ->sum('course_credit')








         $totalclass = $courseinfo->course_class_number;

         $studentinformation = Addstudent::where(['student_id'=>$studentid])->first();

         $deptid = $studentinformation->student_department_id;

      //   return $courseid;


   $studentsemesterfinalcoursemark = DB::table('coursesemesterfinalmarks')
   ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')
   ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')
   ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')
   ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')
   ->where('semester_final_student_id',$studentid)
   ->where('semester_final_course_id',$courseid)
   ->where('semester_final_level_id',$levelid)
   ->where('semester_final_department_id',$deptid)
   ->get();




   return response()->json([


   'courseinfo'=>$courseinfo,
   'studentsemesterfinalcoursemark'=>$studentsemesterfinalcoursemark
   //'totalcoursecreditinsemester'=>$totalcoursecreditinsemester




  ],200);



//   return $studentsemesterfinalcoursemark;

//
// return $courseinfo;




}



//delatecoursefemesterfinalmark


public function delatecoursefemesterfinalmark($semesterfinal_id){


    Coursesemesterfinalmarks::where(['semesterfinal_id'=>$semesterfinal_id])->delete();
    return 1;



}



//showstudentallsemesterfinalcourseresult


public function showstudentallsemesterfinalcourseresult($student_id){



    //= Addstudent::where(['student_id'=>$student_id])->first();

  $studentinfo = DB::table('addstudents')

                ->join('departments','addstudents.student_department_id','=','departments.department_id')
                ->join('levels','addstudents.student_level_id','=','levels.level_id')
                // ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
                // ->join('transports','addstudents.student_bus_id','=','transports.bus_id')
                ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
                ->where('student_id',$student_id)
                ->first();



              //   ->get();




   $levelid = $studentinfo->student_level_id;
   $departmentid = $studentinfo->student_department_id;



$totalcredit = DB::table('courses')

//->join('levels','courses.lev_id','=','levels.level_id')
//->join('departments','courses.dept_id','=','departments.department_id')
->where('lev_id',$levelid)
->where('dept_id',$departmentid)

->sum('course_credit');




  $allsemesterfinalresult = DB::table('coursesemesterfinalmarks')
  ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')
  ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')
  ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')
  ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')
  ->where('semester_final_student_id',$student_id)
  // ->where('semester_final_course_id',$courseid)
  ->where('semester_final_level_id',$levelid)
  ->where('semester_final_department_id',$departmentid)
  ->get();



  $studentgiveexamtotalcredit = DB::table('coursesemesterfinalmarks')
  ->where('semester_final_level_id',$levelid)
  ->where('semester_final_department_id',$departmentid)
  ->where('semester_final_student_id',$student_id)
  ->sum('semester_final_course_credit');





//return $studentgiveexamtotalcredit;


  return response()->json([


  'allsemesterfinalresult'=>$allsemesterfinalresult,
  'studentinfo'=>$studentinfo,
  'totalcredit'=>$totalcredit,
  'studentgiveexamtotalcredit'=>$studentgiveexamtotalcredit
  

 ],200);



//  return $allsemesterfinalresult;



}


//studentsemesterfinalcgpa

public function studentsemesterfinalcgpa($student_id){

    $studentinfo = DB::table('addstudents')

                 ->join('departments','addstudents.student_department_id','=','departments.department_id')
                 ->join('levels','addstudents.student_level_id','=','levels.level_id')
                 ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
                 ->where('student_id',$student_id)
                ->first();


  //$studentinfo = DB::table('addstudents')
       //         ->where('student_id',$student_id)
      //          ->first();


  //$studenti = DB::table('addstudents')
           //     ->where('student_id',$student_id)
           //     ->first();



   $levelid = $studentinfo->student_level_id;
   $departmentid = $studentinfo->student_department_id;




  $sumcredit = DB::table('coursesemesterfinalmarks')
  ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')
  ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')
  ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')
  ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')
  ->where('semester_final_student_id',$student_id)
  ->where('semester_final_level_id',$levelid)
  ->where('semester_final_department_id',$departmentid)
  ->sum('semester_final_course_credit');






   $sumcreditgungreatpoint = DB::table('coursesemesterfinalmarks')
   ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')
   ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')
   ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')
   ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')
   ->where('semester_final_student_id',$student_id)
   ->where('semester_final_level_id',$levelid)
   ->where('semester_final_department_id',$departmentid)
   ->sum('semester_final_coursecredit_gun_course_cgpa');

  //  return $sumcreditgungreatpoint;


     $cgpa = ($sumcreditgungreatpoint/$sumcredit);

    $maincgpa = number_format($cgpa,2);

  //  return $maincgpa;

  






  //$aaa = DB::table('coursesemesterfinalmarks')
    //   ->where('semester_final_student_id',$student_id)
    //   ->where('semester_final_level_id',$levelid)
    //   ->where('semester_final_department_id',$departmentid)

    //   ->get();


  // $info = Addstudent::where(['student_id'=>$student_id])->first();

  // return $aaa;
   //return $levelid;
   //return $studenti;
  // return $departmentid;
  // return $student_id;


   return response()->json([

    'maincgpa'=>$maincgpa
  

    ],200);





}










//resultpublishformction


public function resultpublishformction(Request $request,$student_id){

    $studentinfo = DB::table('addstudents')

                 ->join('departments','addstudents.student_department_id','=','departments.department_id')
                 ->join('levels','addstudents.student_level_id','=','levels.level_id')
                 ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
                 ->where('student_id',$student_id)
                 ->first();




     $studentinfo = Addstudent::where(['student_id'=>$student_id])->first();





   $levelid = $studentinfo->student_level_id;
   $departmentid = $studentinfo->student_department_id;

   $levelincrease = $levelid + 1;

   $leveldecrease = $levelid - 1;



  $courseinfo = DB::table('courses')
              ->where('lev_id',$levelid)
              ->where('dept_id',$departmentid)
              ->sum('course_credit');


  $totalmarks = DB::table('coursesemesterfinalmarks')

              ->where('semester_final_level_id',$levelid)
              ->where('semester_final_department_id',$departmentid)
              ->where('semester_final_student_id',$student_id)
              ->sum('semester_final_total_course_mark');


   $totalcreditearn = DB::table('coursesemesterfinalmarks')
                    ->where('semester_final_student_id',$student_id)
                    ->where('semester_final_level_id',$levelid)
                    ->where('semester_final_department_id', $departmentid)
                    ->sum('semester_final_course_credit');

    $totalcgpaearn = DB::table('coursesemesterfinalmarks')
                     ->where('semester_final_student_id',$student_id)
                     ->where('semester_final_level_id',$levelid)
                     ->where('semester_final_department_id', $departmentid)
                     ->sum('semester_final_course_cgpa');

      $creditguncgpa = ($totalcreditearn * $totalcgpaearn);
      $mycreditguncgpa = number_format($creditguncgpa,2);


      $studentcreditearn = DB::table('coursesemesterfinalmarks')
                       ->where('semester_final_student_id',$student_id)
                       ->where('semester_final_level_id',$levelid)
                       ->where('semester_final_department_id', $departmentid)
                       ->sum('semester_final_course_cgpa');




                       $sumcredit = DB::table('coursesemesterfinalmarks')
                       ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')
                       ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')
                       ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')
                       ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')
                       ->where('semester_final_student_id',$student_id)
                       ->where('semester_final_level_id',$levelid)
                       ->where('semester_final_department_id',$departmentid)
                       ->sum('semester_final_course_credit');

                        $sumcreditgungreatpoint = DB::table('coursesemesterfinalmarks')
                        ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')
                        ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')
                        ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')
                        ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')
                        ->where('semester_final_student_id',$student_id)
                        ->where('semester_final_level_id',$levelid)
                        ->where('semester_final_department_id',$departmentid)
                        ->sum('semester_final_coursecredit_gun_course_cgpa');

                       //  return $sumcreditgungreatpoint;


                         $cgpa = ($sumcreditgungreatpoint/$sumcredit);

                         $maincgpa = number_format($cgpa,2);


                         $todaydate = date("d-m-Y");

              // return $maincgpa;


 $check = Universitysemesterfinalresult::where(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid])->first();



  //$universitysemesterfinalresultid = $check->university_semesterfinal_result_id;


 $runningsemesterfailcount = Coursesemesterfinalmarks::where(['semester_final_student_id'=>$student_id,'semester_final_department_id'=>$departmentid,'semester_final_level_id'=>$levelid,'semester_final_course_grade'=>'F'])->count();


 $previousfail = DB::table('coursesemesterfinalmarks')

               ->where('semester_final_student_id',$student_id)
               ->where('semester_final_department_id',$departmentid)
               ->where('semester_final_level_id','!=',$levelid)
               ->where('semester_final_course_grade','F')
               ->count();


  $totalfail =  ($runningsemesterfailcount + $previousfail); 






$examinfo = Examination::where(['exm_dep_id'=>$departmentid,'exm_level_id'=>$levelid,'exam_status'=>1])->first();

$exmid = $examinfo->exm_id;







  $studentmaxlevel = DB::table('coursesemesterfinalmarks')
                 ->where('semester_final_student_id',$student_id)
                 ->max('semester_final_level_id');






  $levin = ($studentmaxlevel + 1);
   



   if($check){

      $universitysemesterfinalresultid = $check->university_semesterfinal_result_id;

       if($previousfail !== 0){





//mymmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm

          
             if($studentmaxlevel ==  $levelid){



                              

                         
                   if($runningsemesterfailcount == 1 && $previousfail == 1){   

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                         Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                         return 29;
                      }

                      else if($runningsemesterfailcount == 1 && $previousfail == 2){     

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);
                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);
                        
                          return 30;

                        }

                        //////////////////////////////////////////////////



                      else if($runningsemesterfailcount == 1 && $previousfail == 3){     

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);
                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);
                        
                          return 500;

                        }




                       else if($runningsemesterfailcount == 2 && $previousfail == 1){
                       
                         Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                          return 31;

                          }

                              else if($runningsemesterfailcount == 2 && $previousfail == 2){

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);
                        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                        return 34;
    
                          }
                          ///////////////////////////////////////////////////////////////


                        else if($runningsemesterfailcount == 2 && $previousfail == 3){

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);
                        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                        return 34;
    
                          }


                       
                            else if($runningsemesterfailcount == 0 && $previousfail == 1){

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                          return 33;
                       
                           }


                        else if($runningsemesterfailcount == 0 && $previousfail == 2){

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                          return 32;
                          
                          }

                   

                           ////////////////////////////////////////////////////////////////////

                        else if($runningsemesterfailcount == 0 && $previousfail == 3){

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                          return 603;
                       
                           }


                    

                       else if($runningsemesterfailcount == 0 && $previousfail == 0){

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                       Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                        return 1000;
    
                          }


                          else{


                          return 'condition not match';

                           // return $previousfail;
       

                          }













           



             }else{



                             

                         
                   if($runningsemesterfailcount == 1 && $previousfail == 1){   

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                         Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                         return 29;
                      }

                      else if($runningsemesterfailcount == 1 && $previousfail == 2){     

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);
                        
                          return 30;

                        }

                        //////////////////////////////////////////////////



                      else if($runningsemesterfailcount == 1 && $previousfail == 3){     

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);
                        
                          return 500;

                        }




                       else if($runningsemesterfailcount == 2 && $previousfail == 1){
                       
                         Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                          return 31;

                          }

                              else if($runningsemesterfailcount == 2 && $previousfail == 2){

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                        return 34;
    
                          }
                          ///////////////////////////////////////////////////////////////


                        else if($runningsemesterfailcount == 2 && $previousfail == 3){

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                        return 34;
    
                          }


                       
                            else if($runningsemesterfailcount == 0 && $previousfail == 1){

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                          return 33;
                       
                           }


                        else if($runningsemesterfailcount == 0 && $previousfail == 2){

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                          return 32;
                          
                          }

                   

                           ////////////////////////////////////////////////////////////////////

                        else if($runningsemesterfailcount == 0 && $previousfail == 3){

                        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                          return 603;
                       
                           }


                    

                       else if($runningsemesterfailcount == 0 && $previousfail == 0){

                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                       Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                        return 1000;
    
                          }


                          else{


                          return 'condition not match';

                           // return $previousfail;
       

                          }



















             }





























//777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777
















                         
            //       if($runningsemesterfailcount == 1 && $previousfail == 1){   

            //           Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

               //          Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

               //          return 29;
               //       }

             //         else if($runningsemesterfailcount == 1 && $previousfail == 2){     

                //        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                    //      Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);
                        
                //          return 30;

              //          }

                        //////////////////////////////////////////////////



                 //     else if($runningsemesterfailcount == 1 && $previousfail == 3){     

                 //       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                 //        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);
                        
                 //         return 500;

                 //       }




                 //      else if($runningsemesterfailcount == 2 && $previousfail == 1){
                       
                   //      Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                   //       Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                    //      return 31;

                    //      }

               //               else if($runningsemesterfailcount == 2 && $previousfail == 2){

               //        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                //        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                //        return 34;
    
                  //        }
                          ///////////////////////////////////////////////////////////////


              //          else if($runningsemesterfailcount == 2 && $previousfail == 3){

              //         Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                //        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                   //     return 34;
    
                   //       }


                       
               //             else if($runningsemesterfailcount == 0 && $previousfail == 1){

                //        Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                  //        Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                  //        return 33;
                       
                  //         }


             //           else if($runningsemesterfailcount == 0 && $previousfail == 2){

             //           Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                    //      Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                     //     return 32;
                          
                     //     }

                   

                           ////////////////////////////////////////////////////////////////////

          //              else if($runningsemesterfailcount == 0 && $previousfail == 3){

          //              Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

            //              Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

            //              return 603;
                       
             //              }


                    

              //         else if($runningsemesterfailcount == 0 && $previousfail == 0){

              //         Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);
                //       Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                 //       return 1000;
    
                 //         }


                 //         else{


                  //        return 'condition not match';

                    
       

                  //        }










       }else if($previousfail == 0){


                         if($runningsemesterfailcount == 0){
                             
                                Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Pass','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);


                                  Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=>$levin]);
                             
                                  return 35;   
                         }else if($runningsemesterfailcount == 1){


                                   Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                                     Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);
                                     
                                    return 36;

                          
                         }else if($runningsemesterfailcount == 2){


                                       Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Promoted','university_semesterfinal_mark_addeddate'=>$todaydate]);

                                         Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                                        return 37;

                          // return 'running fail = 2 semster update';
                         }else if($runningsemesterfailcount >= 3){

                                         
                                    Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->update(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid,'university_semesterfinal_exam_id'=>$exmid,'university_semesterfinal_total_course_credit'=>$totalcreditearn,'university_semesterfinal_total_mark'=>$totalmarks,'university_semesterfinal_student_earn_total'=>$totalcgpaearn,'sumof_total_coursecredit_gun_student_earn_cgpa'=>$sumcreditgungreatpoint,'university_semesterfinal_student_cgpa'=>$maincgpa,'university_semesterfinal_mark_status'=>'Fail','university_semesterfinal_main_status'=>'Semester Drop','university_semesterfinal_mark_addeddate'=>$todaydate]);

                                     Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $studentmaxlevel]);

                                     return 40;
                         }else{


                            return 'not matching';

                         }





       }else{

             
             return 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb';



       }

    

   }else{
        

           if($previousfail !== 0){
                           
                    if($runningsemesterfailcount == 1 && $previousfail == 1){
                   
                          // return 'running fail = 1 previous fail = 1 total = 1  semster update';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Semester Promoted';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                
 
                    return 9;

                      }else if($runningsemesterfailcount == 1 && $previousfail == 2){

                          // return 'running fail = 1 previous fail = 2 total = 3  need refered or backlock';

                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Refered Or Backlock';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                  
 
                    return 10;

                           }
                          else if($runningsemesterfailcount == 2 && $previousfail == 1){
                   
                  $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Refered Or Backlock';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 

                    return 11;

                          }else if($runningsemesterfailcount == 0 && $previousfail == 2){
                   
                        //   return 'running fail = 0 previous = 2   total = 2   semester update';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Pass'; 
                    $student->university_semesterfinal_main_status = 'Semester Promoted';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 
                  //  Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levelincrease]);

                    Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                    //studentmaxlevel

                    return 12;


                          }else if($runningsemesterfailcount == 0 && $previousfail == 1){


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Pass'; 
                    $student->university_semesterfinal_main_status = 'Semester Promoted';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 
            

                    Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

                    return 13;
                   
                        //   return 'running fail = 0 previous = 1   total = 1   semester update';

                          } else if($runningsemesterfailcount == 2 && $previousfail == 2){
                   
                       //    return 'running fail = 2 previous fail = 2 total = 4  need refered or backlock';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Refered Or Backlock';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 

                    return 14;


                      }

                      else if($runningsemesterfailcount >= 3 && $previousfail == 2){
                   
                       //    return 'running fail = 2 previous fail = 2 total = 4  need refered or backlock';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Semester Drop';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 

                    return 201;


                      }



                      else if($runningsemesterfailcount >= 3 && $previousfail == 1){
                   
                       //    return 'running fail = 2 previous fail = 2 total = 4  need refered or backlock';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Semester Drop';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 

                    return 202;


                      }




                      else if($runningsemesterfailcount >= 3 && $previousfail == 0){
                   
                       //    return 'running fail = 2 previous fail = 2 total = 4  need refered or backlock';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Semester Drop';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
                 

                    return 203;


                      }







                      else if($runningsemesterfailcount == 0 && $previousfail == 0){
                   
                          // return 'running fail = 0 previous = 0 total = 0 success fully update semester with no fail';


                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Pass'; 
                    $student->university_semesterfinal_main_status = 'Semester Promoted';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
              

                    Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);
                     
                    return 15;

                          }else{

                    
                            return 'Some thing is Wrong';

                          }




             }else if($previousfail == 0){

                         if($runningsemesterfailcount == 0){
                            // return 'successfully update no fail';

                    $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Pass'; 
                    $student->university_semesterfinal_main_status = 'Semester Promoted';                                                      
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();

                    Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);

    
                    return 1;
                         }else if($runningsemesterfailcount == 1){

                          // return 'running fail = 1 semster update';

                         $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail';   
                    $student->university_semesterfinal_main_status = 'Semester Promoted'; 
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();


                    Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);
    
                    return 2;
                         }else if($runningsemesterfailcount == 2){

                          // return 'running fail = 2 semster update';
                          $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail'; 
                    $student->university_semesterfinal_main_status = 'Semester Promoted';   
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();


                    Addstudent::where(['student_id'=>$student_id])->update(['student_level_id'=> $levin]);
                    return 3;


                         }else if($runningsemesterfailcount >= 3){

                        //   return 'running fail = 3 or 3+ semester drop';

                            $student  = new Universitysemesterfinalresult;
                    $student->university_semesterfinal_student_id = $student_id;
                    $student->university_semesterfinal_department_id = $departmentid;
                    $student->university_semesterfinal_level_id  = $levelid;
                    $student->university_semesterfinal_exam_id  = $exmid;                 
                    $student->university_semesterfinal_total_course_credit = $totalcreditearn;
                    $student->university_semesterfinal_total_mark  = $totalmarks;
                    $student->university_semesterfinal_student_earn_total = $totalcgpaearn;
                    $student->sumof_total_coursecredit_gun_student_earn_cgpa = $sumcreditgungreatpoint;
                    $student->university_semesterfinal_student_cgpa = $maincgpa;
                    $student->university_semesterfinal_mark_status = 'Fail';   
                    $student->university_semesterfinal_main_status = 'Semester Drop';    
                    $student->university_semesterfinal_mark_addeddate = $todaydate;
                    $student->save();
    
                    return 4;


                         }else{


                            return 'not matching';

                         }


                        
             }else{

               return 'AAAA.............................................................................';


               }
      




   }



   






}


//showstudentallsemesterfinalresultandcgpa


public function showstudentallsemesterfinalresultandcgpa($student_id){


  $studentinfo = DB::table('addstudents')

                ->join('departments','addstudents.student_department_id','=','departments.department_id')
                ->join('levels','addstudents.student_level_id','=','levels.level_id')
                ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
                ->where('student_id',$student_id)
                ->first();

   $levelid = $studentinfo->student_level_id;
   $departmentid = $studentinfo->student_department_id;

  $allresult = Universitysemesterfinalresult::where(['university_semesterfinal_student_id'=>$student_id,'university_semesterfinal_department_id'=>$departmentid,'university_semesterfinal_level_id'=>$levelid])->get();


  $allresult = DB::table('universitysemesterfinalresults')

  ->join('departments','universitysemesterfinalresults.university_semesterfinal_department_id','=','departments.department_id')
  ->join('levels','universitysemesterfinalresults.university_semesterfinal_level_id','=','levels.level_id')
  ->join('addstudents','universitysemesterfinalresults.university_semesterfinal_student_id','=','addstudents.student_id')
  ->join('examinations','universitysemesterfinalresults.university_semesterfinal_exam_id','=','examinations.exm_id')






    ->where('university_semesterfinal_student_id',$student_id)
    ->where('university_semesterfinal_department_id',$departmentid)
    // ->where('university_semesterfinal_level_id',$levelid)
    ->get();



    $sumofcreditguncgpa = DB::table('universitysemesterfinalresults')

    ->join('departments','universitysemesterfinalresults.university_semesterfinal_department_id','=','departments.department_id')
    ->join('levels','universitysemesterfinalresults.university_semesterfinal_level_id','=','levels.level_id')
    ->join('addstudents','universitysemesterfinalresults.university_semesterfinal_student_id','=','addstudents.student_id')

      ->where('university_semesterfinal_student_id',$student_id)
      ->where('university_semesterfinal_department_id',$departmentid)
      ->sum('sumof_total_coursecredit_gun_student_earn_cgpa');


    $sumoftotalcredit = DB::table('universitysemesterfinalresults')

    ->join('departments','universitysemesterfinalresults.university_semesterfinal_department_id','=','departments.department_id')
    ->join('levels','universitysemesterfinalresults.university_semesterfinal_level_id','=','levels.level_id')
    ->join('addstudents','universitysemesterfinalresults.university_semesterfinal_student_id','=','addstudents.student_id')

      ->where('university_semesterfinal_student_id',$student_id)
      ->where('university_semesterfinal_department_id',$departmentid)
      ->sum('university_semesterfinal_total_course_credit');


     
  //

      if($sumoftotalcredit !== 0){
       
             $cgpa = ($sumofcreditguncgpa/$sumoftotalcredit);

      }else{

              $cgpa = 0;

      }





      $averagecpga = number_format($cgpa,2);



      return response()->json([

      'studentinfo'=>$studentinfo,
      'allresult'=>$allresult,
      'averagecpga'=>$averagecpga
      // 'studentsemesterfinalcoursemark'=>$studentsemesterfinalcoursemark

     ],200);


  //return $allresult;




}


//showuniversitysemesterfinalspeceficresult


public function showuniversitysemesterfinalspeceficresult($result_id){


 //$semesterfinalinfo = DB::table('universitysemesterfinalresults')

  //    ->where('university_semesterfinal_result_id',$result_id)
  //    ->first();
    
    $info = Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$result_id])->first();





    $levelid = $info->university_semesterfinal_level_id;

    $departmentid = $info->university_semesterfinal_department_id;

    $studentid = $info->university_semesterfinal_student_id;

    $exmid = $info->university_semesterfinal_exam_id;



  
   $viewresult = DB::table('coursesemesterfinalmarks')

   ->join('addstudents','coursesemesterfinalmarks.semester_final_student_id','=','addstudents.student_id')

   ->join('levels','coursesemesterfinalmarks.semester_final_level_id','=','levels.level_id')

   ->join('courses','coursesemesterfinalmarks.semester_final_course_id','=','courses.course_id')


  ->join('departments','coursesemesterfinalmarks.semester_final_department_id','=','departments.department_id')

   ->where('semester_final_student_id',$studentid)

   ->where('semester_final_exam_id',$exmid)
   ->where('semester_final_level_id',$levelid)
  ->where('semester_final_department_id',$departmentid)



   ->get();

  


//return $info;


      return response()->json([

      'viewresult'=>$viewresult
    

    ],200);





}



















}

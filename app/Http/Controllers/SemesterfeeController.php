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
use App\Adddepartmenttutionfee;
use App\Studentgivessemesterfee;
use App\Examination;
use App\Course;
use App\Coursesemesterfinalmarks;

use App\Addstudentcourse;


use DB;
use DateTime;
Use Image;
use DateTimeZone;

use Session;
session_start();

class SemesterfeeController extends Controller
{



//addstudentgivesemesterfeeamount








  //alllevelshowindepartmenttutionfee

    public function alllevelshowintutionfee(){


     $alllevel = Level::where(['level_status'=>1])->get();

     return response()->json([

     'alllevel'=>$alllevel

    ],200);


    }


//adddepartmenttutionfeeformaction


public function adddepartmenttutionfeeformaction(Request $request){


  // $data = $request->all();
   $departmentid = $request->dep_tutionfee_dep_id;
   $levelid = $request->dep_tutionfee_level_id;
   $type = $request->department_tution_fee_type;

   $check = Adddepartmenttutionfee::where(['dep_tutionfee_dep_id'=>$departmentid,'dep_tutionfee_level_id'=>$levelid,'department_tution_fee_type'=>$type])->first();

   if($check){

     return 0;

   }else{


     $adddepartmenttutionfee = new Adddepartmenttutionfee;
     $adddepartmenttutionfee->dep_tutionfee_dep_id = $departmentid;
     $adddepartmenttutionfee->dep_tutionfee_level_id = $levelid;
     $adddepartmenttutionfee->department_tution_fee_amount = $request->department_tution_fee_amount;

     $adddepartmenttutionfee->department_tution_fee_added_date = $request->department_tution_fee_added_date;
     $adddepartmenttutionfee->department_tution_fee_last_date = $request->department_tution_fee_last_date;

     $adddepartmenttutionfee->department_tution_fee_type = $request->department_tution_fee_type;

     $adddepartmenttutionfee->save();


   return 1;



   }


}

//showalldepartmenttutionfee


public function showalldepartmenttutionfee(){

   $gettutionfeeall =  DB::table('adddepartmenttutionfees')


         ->join('levels','adddepartmenttutionfees.dep_tutionfee_level_id','=','levels.level_id')
         ->join('departments','adddepartmenttutionfees.dep_tutionfee_dep_id','=','departments.department_id')

         ->get();

   return response()->json([

   'gettutionfeeall'=>$gettutionfeeall

  ],200);




}


//showalldepartmentinfrom

public function showalldepartmentinfrom(){

  $alldepartment = Department::where(['department_added_date_status'=>1])->get();

  return response()->json([

  'alldepartment'=>$alldepartment

 ],200);



}

//editdepartmenttutionfeeplaceholdervalue

public function editdepartmenttutionfeeplaceholdervalue($department_tution_fee_id){



  return Adddepartmenttutionfee::where(['department_tution_fee_id'=>$department_tution_fee_id])->first();
  //return $department_tution_fee_id;



}


//updatedepartmenttutionfee

public function updatedepartmenttutionfee(Request $request,$department_tution_fee_id){

  $data = $request->all();

  Adddepartmenttutionfee::where(['department_tution_fee_id'=>$department_tution_fee_id])->update(['dep_tutionfee_dep_id'=>$data['dep_tutionfee_dep_id'],'dep_tutionfee_level_id'=>$data['dep_tutionfee_level_id'],'department_tution_fee_amount'=>$data['department_tution_fee_amount'],'department_tution_fee_type'=>$data['department_tution_fee_type'],'department_tution_fee_added_date'=>$data['department_tution_fee_added_date'],'department_tution_fee_last_date'=>$data['department_tution_fee_last_date']]);



 return 1;





}















//addstudentgivesemesterfeeamount

public function addstudentgivesemesterfeeamount(Request $request){

  //  $data = $request->all();

  // return $data;

   $reqstudentroll = $request->student_givesemesterfee_studentroll;
   $reqstudentlevel = $request->student_givesemesterfee_stuentlevel;
   $reqstudentdepartment = $request->student_givesemesterfee_stuentdepartment;



   $checksemesterfeealreadygivenornot = Studentgivessemesterfee::where(['student_givesemesterfee_studentroll'=>$reqstudentroll,'student_givesemesterfee_stuentlevel'=>$reqstudentlevel])->first();

  // $tutionfeeinfo = Adddepartmenttutionfee::where(['dep_tutionfee_dep_id'=>$reqstudentdepartment,'dep_tutionfee_level_id'=>$reqstudentlevel])->first();

  // return $tutionfeeinfo;
  //$tutionfeeamount = $tutionfeeinfo->department_tution_fee_amount;
 // $tutionfeedepartment = $tutionfeeinfo->dep_tutionfee_dep_id;
 // $tutionfeelevel = $tutionfeeinfo->dep_tutionfee_level_id;
 // $tutionfeetype = $tutionfeeinfo->department_tution_fee_type;
 // $tutionfeeaddeddate = $tutionfeeinfo->department_tution_fee_added_date;
 // $tutionfeelastdate = $tutionfeeinfo->department_tution_fee_last_date;


   $checkrollrightornot = Addstudent::where(['student_roll'=>$reqstudentroll,'student_department_id'=>$reqstudentdepartment,'student_level_id'=>$reqstudentlevel])->first();


  
 // echo  $tutionfeelastdate;




   $levelinfo = Level::where(['level_id'=>$reqstudentlevel])->first();
   
   $dp_semesterfee = $levelinfo->level_dpt_tution_free;
   $dp_semesterfee_lastdate = $levelinfo->level_expire_date;
   $student_give_semesterfee_date = $request->student_givesemesterfee_date;
   $my_given_amount = $request->student_givesemesterfee_amount;


 //  echo $student_give_semesterfee_date;
  

//  return   $tutionfeelastdate;


   // $departmentinfo = Department::where(['department_id'=>$reqstudentdepartment])->first();
   //
   // $departmentsemesterfee =  $departmentinfo->department_semester_fee;
   //
   // $semesterfeelastdate =  	$departmentinfo->department_added_date;
   //
   // $studentinfo = Addstudent::where(['student_roll'=>$reqstudentroll,'student_level_id'=>$reqstudentlevel,'student_department_id'=>$reqstudentdepartment])->first();
   //
   //
   //

      $today = date("d-m-Y");
      $datetime1 = new DateTime($dp_semesterfee_lastdate);
      $datetime2 = new DateTime($student_give_semesterfee_date);
      $interval = $datetime1->diff($datetime2);
      $datedifference = $interval->format('%a');



      $mydate  = strtotime($student_give_semesterfee_date);
      $myexpiredate = strtotime($dp_semesterfee_lastdate);



      //check this is the right roll or not
if($checkrollrightornot){
         
        if($checksemesterfeealreadygivenornot){

            
            return 12;


         }else{

              $fine = $datedifference * 20;
              $fineplussemesterfee = ($dp_semesterfee +  $fine);

              $myextramoney = ($request->student_givesemesterfee_amount - $fineplussemesterfee);

              $lossbalance = ($fineplussemesterfee - $request->student_givesemesterfee_amount);
             


               //fine hoisa and taka fine + semester er caya beshi desi
               // semester fee = 400 , fine + semester fee = 450 , ame deshi 500
               if($mydate > $myexpiredate && $my_given_amount > $fineplussemesterfee){


                     $givesemesterfee = new Studentgivessemesterfee;
                     $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
                     $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
                     $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;
                     $givesemesterfee->main_semester_fee = $dp_semesterfee;
                     $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;
                     $givesemesterfee->student_givesemesterfee_fine = $fine;
                     $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $fineplussemesterfee;
                     $givesemesterfee->student_givesemesterfee_extra_money = $myextramoney;
                     $givesemesterfee->student_givesemesterfee_loss_blance = 0;
                     $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;

                     $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
                     $givesemesterfee->fine_duration = $datedifference;
                     $givesemesterfee->save();

                      return 1;
                   
                  // echo "my date is big need fine and my anmount is big";

               }

                //fine hoisa and taka fine + semester er caya kom desi
               // semester fee = 400 , fine + semester fee = 450 , ame deshi 300

               else if($mydate > $myexpiredate && $my_given_amount < $fineplussemesterfee){


                        
                     $givesemesterfee = new Studentgivessemesterfee;
                     $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
                     $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
                     $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;
                     $givesemesterfee->main_semester_fee = $dp_semesterfee;
                     $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;
                     $givesemesterfee->student_givesemesterfee_fine = $fine;
                     $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $fineplussemesterfee;
                     $givesemesterfee->student_givesemesterfee_extra_money = 0;
                     $givesemesterfee->student_givesemesterfee_loss_blance = $lossbalance;
                     $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;

                     $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
                     $givesemesterfee->fine_duration = $datedifference;
                     $givesemesterfee->save();



               return 2;



                 //fine hoisa and taka  fine + semester er soman disi
               // semester fee = 400 , fine + semester fee = 450 , ame deshi 450

               }else if($mydate > $myexpiredate && $my_given_amount == $fineplussemesterfee){


                    
                     $givesemesterfee = new Studentgivessemesterfee;
                     $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
                     $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
                     $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;
                     $givesemesterfee->main_semester_fee = $dp_semesterfee;
                     $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;
                     $givesemesterfee->student_givesemesterfee_fine = $fine;
                     $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $fineplussemesterfee;
                     $givesemesterfee->student_givesemesterfee_extra_money = 0;
                     $givesemesterfee->student_givesemesterfee_loss_blance = 0;
                     $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;

                     $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
                     $givesemesterfee->fine_duration = $datedifference;
                     $givesemesterfee->save();

                   return 3;


               }



               //ffine hoi ne karon last date ataka didi ,semester fee er last date a , semester fee er soman taka dici 
               // semester fee = 400 ,  semester fee = 400 , ame deshi 400

       else if($mydate == $myexpiredate && $my_given_amount == $fineplussemesterfee){



         $givesemesterfee = new Studentgivessemesterfee;
        $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
        $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
        $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;

        $givesemesterfee->main_semester_fee = $dp_semesterfee;

        $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;

        $givesemesterfee->student_givesemesterfee_fine = 0;
        $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $dp_semesterfee;

        $givesemesterfee->student_givesemesterfee_extra_money = 0;
        $givesemesterfee->student_givesemesterfee_loss_blance = 0;
        $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;
        $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
        $givesemesterfee->fine_duration = 0;
        $givesemesterfee->save();

              return 4;
                   






       }



else if($mydate == $myexpiredate && $my_given_amount > $fineplussemesterfee){



         $givesemesterfee = new Studentgivessemesterfee;
        $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
        $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
        $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;

        $givesemesterfee->main_semester_fee = $dp_semesterfee;

        $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;

        $givesemesterfee->student_givesemesterfee_fine = 0;
        $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $dp_semesterfee;

        $givesemesterfee->student_givesemesterfee_extra_money = ($request->student_givesemesterfee_amount - $dp_semesterfee);
        $givesemesterfee->student_givesemesterfee_loss_blance = 0;
        $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;
        $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
        $givesemesterfee->fine_duration = 0;
        $givesemesterfee->save();

              return 5;
                   


       }




else if($mydate == $myexpiredate && $my_given_amount < $fineplussemesterfee){



         $givesemesterfee = new Studentgivessemesterfee;
        $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
        $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
        $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;

        $givesemesterfee->main_semester_fee = $dp_semesterfee;

        $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;

        $givesemesterfee->student_givesemesterfee_fine = 0;
        $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $dp_semesterfee;

        $givesemesterfee->student_givesemesterfee_extra_money = 0;
        $givesemesterfee->student_givesemesterfee_loss_blance = ($dp_semesterfee-$request->student_givesemesterfee_amount);
        $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;
        $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
        $givesemesterfee->fine_duration = 0;
        $givesemesterfee->save();

              return 6;
                   


       }












          else if($mydate < $myexpiredate && $my_given_amount < $fineplussemesterfee){



                 $givesemesterfee = new Studentgivessemesterfee;
                 $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
                 $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
                 $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;
                 $givesemesterfee->main_semester_fee = $dp_semesterfee;
                 $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;
                 $givesemesterfee->student_givesemesterfee_fine = 0;
                 $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $dp_semesterfee;
                 $givesemesterfee->student_givesemesterfee_extra_money = 0;
                 $givesemesterfee->student_givesemesterfee_loss_blance = ($dp_semesterfee - $my_given_amount);
                 $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;
                 $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
                 $givesemesterfee->fine_duration = 0;
                 $givesemesterfee->save();

                 return 7;
                   






       }


       else if($mydate > $myexpiredate && $my_given_amount == $fineplussemesterfee){


                    
                     $givesemesterfee = new Studentgivessemesterfee;
                     $givesemesterfee->student_givesemesterfee_studentroll = $request->student_givesemesterfee_studentroll;
                     $givesemesterfee->student_givesemesterfee_stuentlevel = $request->student_givesemesterfee_stuentlevel;
                     $givesemesterfee->student_givesemesterfee_stuentdepartment = $request->student_givesemesterfee_stuentdepartment;
                     $givesemesterfee->main_semester_fee = $dp_semesterfee;
                     $givesemesterfee->student_givesemesterfee_amount = $request->student_givesemesterfee_amount;
                     $givesemesterfee->student_givesemesterfee_fine = $fine;
                     $givesemesterfee->student_givesemesterfee_fine_plus_total_amount = $fineplussemesterfee;
                     $givesemesterfee->student_givesemesterfee_extra_money = 0;
                     $givesemesterfee->student_givesemesterfee_loss_blance = 0;
                     $givesemesterfee->student_givesemesterfee_added_date = $request->student_givesemesterfee_date;

                     $givesemesterfee->student_givesemesterfee_expire_date = $dp_semesterfee_lastdate;
                     $givesemesterfee->fine_duration = $datedifference;
                     $givesemesterfee->save();

                   return 8;


               }




              else{

                  return 9;

               }



           

      }
          
         


      }else{


          return 11;


      }
   







   //
    //$mytoday  = strtotime($today);
   // $myexpiredate = strtotime($semesterfeelastdate);

   // echo $mytoday;
   //
   // if($studentinfo){
   //
   //
   //
   //
   //
   //   return $datedifference;
   //
   //
   // }else{
   //
   //   return " not Success";
   //
   //
   // }



}


//addstudentgivesemesterfeeamount

//
// public function addstudentgivesemesterfeeamount(Request $request){
//
//
//    return 100000000000;
//
//
//
//
// }


//showallstudentgivensemesterfee

public function showallstudentgivensemesterfee(){  



        $slowallsemesterfee = DB::table('studentgivessemesterfees')


         ->join('levels','studentgivessemesterfees.student_givesemesterfee_stuentlevel','=','levels.level_id')

         ->join('departments','studentgivessemesterfees.student_givesemesterfee_stuentdepartment','=','departments.department_id')

       ->join('addstudents','studentgivessemesterfees.student_givesemesterfee_studentroll','=','addstudents.student_roll')->get();



        //     ->join('levels','adddepartmenttutionfees.dep_tutionfee_level_id','=','levels.level_id')
        // ->join('departments','adddepartmenttutionfees.dep_tutionfee_dep_id','=','departments.department_id')
//addstudents.student_roll

       // return $slowallsemesterfee;


   return response()->json([

    'slowallsemesterfee'=>$slowallsemesterfee

  ],200);



}





//editstudent_allsemesterfeeplaceholdervalue


public function editstudent_allsemesterfeeplaceholdervalue($student_givesemesterfee_id){


  return Studentgivessemesterfee::where(['student_givesemesterfee_id'=>$student_givesemesterfee_id])->first();




}


//updatestudentsemesterfee

public function updatestudentsemesterfee(Request $request,$student_givesemesterfee_id){
    $data = $request->all();


   $studentroll = $request->student_givesemesterfee_studentroll;
   $studentdpt = $request->student_givesemesterfee_stuentdepartment;
   $studentlevel = $request->student_givesemesterfee_stuentlevel;



  $checkrollrightornot = Addstudent::where(['student_roll'=>$studentroll,'student_department_id'=>$studentdpt,'student_level_id'=>$studentlevel])->first();


  //$levelinfo = Level::where(['level_id'=>$reqstudentlevel])->first();
   
  // $dp_semesterfee = $levelinfo->level_dpt_tution_free;
  // $dp_semesterfee_lastdate = $levelinfo->level_expire_date;
 //  $student_give_semesterfee_date = $request->student_givesemesterfee_date;
 //  $my_given_amount = $request->student_givesemesterfee_amount;




  if($checkrollrightornot){


Studentgivessemesterfee::where(['student_givesemesterfee_id'=>$student_givesemesterfee_id])->update(['student_givesemesterfee_studentroll'=>$data['student_givesemesterfee_studentroll'],'student_givesemesterfee_stuentlevel'=>$data['student_givesemesterfee_stuentlevel'],'student_givesemesterfee_stuentdepartment'=>$data['student_givesemesterfee_stuentdepartment'],'main_semester_fee'=>$data['main_semester_fee'],'student_givesemesterfee_amount'=>$data['student_givesemesterfee_amount'],'student_givesemesterfee_fine'=>$data['student_givesemesterfee_fine'],'student_givesemesterfee_fine_plus_total_amount'=>$data['student_givesemesterfee_fine_plus_total_amount'],'student_givesemesterfee_extra_money'=>$data['student_givesemesterfee_extra_money'],'student_givesemesterfee_loss_blance'=>$data['student_givesemesterfee_loss_blance'],'student_givesemesterfee_added_date'=>$data['student_givesemesterfee_added_date'],'student_givesemesterfee_expire_date'=>$data['student_givesemesterfee_expire_date'],'fine_duration'=>$data['fine_duration']]);


     return 1;

  }else{


 return 2;


  }



}


//delatestudentsemeterfee


public function delatestudentsemeterfee($student_givesemesterfee_id){

       Studentgivessemesterfee::where(['student_givesemesterfee_id'=>$student_givesemesterfee_id])->delete();

}


//viewspecificstudentallsemesterfee

public function viewspecificstudentallsemesterfee($student_id){


   $stu_info = Addstudent::where(['student_id'=>$student_id])->first();

   $stu_dep = $stu_info->student_department_id;
   $stu_lev = $stu_info->student_level_id;
   $stu_roll = $stu_info->student_roll;



 $showtudentgiveallsemesterfee = DB::table('studentgivessemesterfees')


         ->join('levels','studentgivessemesterfees.student_givesemesterfee_stuentlevel','=','levels.level_id')

         ->join('departments','studentgivessemesterfees.student_givesemesterfee_stuentdepartment','=','departments.department_id')

           ->join('addstudents','studentgivessemesterfees.student_givesemesterfee_studentroll','=','addstudents.student_roll')

          ->where('student_givesemesterfee_studentroll',$stu_roll)

         // ->where('student_givesemesterfee_stuentlevel',$stu_lev)

          ->where('student_givesemesterfee_stuentdepartment',$stu_dep)

         ->get();






  
 // $showtudentgiveallsemesterfee = Studentgivessemesterfee::where(['student_givesemesterfee_studentroll'=>$stu_roll,'student_givesemesterfee_stuentlevel'=>$stu_lev,'student_givesemesterfee_stuentdepartment'=>$stu_dep])->get();


    return response()->json([

   'showtudentgiveallsemesterfee'=>$showtudentgiveallsemesterfee

  ],200);



 //return $showtudentgiveallsemesterfee;



}









//viewspecificstudentallsemesterfeedue


public function viewspecificstudentallsemesterfeedue($student_id){


   //$stu_info = Addstudent::where(['student_id'=>$student_id])->first();

     $my_student_info = DB::table('addstudents')


         ->join('levels','addstudents.student_level_id','=','levels.level_id')
         ->join('departments','addstudents.student_department_id','=','departments.department_id')


           ->where('student_id',$student_id)

          ->first();


      $stuinfo = Addstudent::where(['student_id'=>$student_id])->first();



   $stu_dep = $stuinfo->student_department_id;
   $stu_lev = $stuinfo->student_level_id;
   $stu_roll = $stuinfo->student_roll;
   $stu_name = $stuinfo->student_name;


   $levelname = $stuinfo->level_name;
   $departmentname = $stuinfo->department_name;




   
   $stu_levelinfo = Level::where(['level_id'=>$stu_lev,'dpt_myid'=>$stu_dep])->first();






   $mainsemesterfee = $stu_levelinfo->level_dpt_tution_free;

   $semesterfeelastdate = $stu_levelinfo->level_expire_date;






    $today = date("d-m-Y");
    $datetime1 = new DateTime($semesterfeelastdate);
    $datetime2 = new DateTime($today);
    $interval = $datetime1->diff($datetime2);
    $datedifference = $interval->format('%a');


    $mytoday  = strtotime($today);



    $semesterfeeeexpiredate = strtotime($semesterfeelastdate);



   // $checksemesterfeegivenornot = Studentgivessemesterfee::where(['student_givesemesterfee_studentroll'=>$stu_roll,'student_givesemesterfee_stuentlevel'=>$stu_lev,'student_givesemesterfee_stuentdepartment'=>$departmentname])->first();


   $checksemesterfeegivenornot = Studentgivessemesterfee::where(['student_givesemesterfee_studentroll'=>$stu_roll,'student_givesemesterfee_stuentlevel'=>$stu_lev,'student_givesemesterfee_stuentdepartment'=>$stu_dep])->first();

   

 // return $checksemesterfeegivenornot;
 // return $checksemesterfeegivenornot;





 //$check = Studentgivessemesterfee::where(['student_givesemesterfee_studentroll'=>$stu_roll])->first();








if($checksemesterfeegivenornot){


             $student_give = $checksemesterfeegivenornot->student_givesemesterfee_amount;

             $givensemesterfeedate = $checksemesterfeegivenornot->student_givesemesterfee_added_date;

             $stu_fine = $checksemesterfeegivenornot->student_givesemesterfee_fine;

             $stufine_plustotal_amount = $checksemesterfeegivenornot->student_givesemesterfee_fine_plus_total_amount;

             $fine_plus_total = $checksemesterfeegivenornot->student_givesemesterfee_fine_plus_total_amount;

             $stu_give_extra = $checksemesterfeegivenornot->student_givesemesterfee_extra_money;

             $loss_balance = $checksemesterfeegivenornot->student_givesemesterfee_loss_blance;

             $given_date = $checksemesterfeegivenornot->student_givesemesterfee_added_date;

             $expire_date = $checksemesterfeegivenornot->student_givesemesterfee_expire_date;

             $mainsemester_fee = $checksemesterfeegivenornot->main_semester_fee;

             $fine_duration = $checksemesterfeegivenornot->fine_duration;

             //$semesterfee_status = 'success'

             $mysemesterfeedate = strtotime($givensemesterfeedate);



         if($semesterfeeeexpiredate < $mysemesterfeedate){

                         //ame late kore disci

                          if($student_give < $stufine_plustotal_amount){

              
                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                      
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                        // $semesterfeestatus = $semesterfee_status;
                         $studue = 'Due';

                         $fineduration = $fine_duration;

                          //$stufinestatus = 'Fine';



                           }else if($student_give == $stufine_plustotal_amount){

                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                  
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                        // $semesterfeestatus = $semesterfee_status;
                         $studue = 'No Due';

                          $fineduration = $fine_duration;
                        // $stufinestatus = 'No Fine';


                           }else if($student_give > $stufine_plustotal_amount){


                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                         
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                       //  $semesterfeestatus = $semesterfee_status;
                         $studue = 'No Due';

                          $fineduration = $fine_duration;

                          }else{

                          return 'kkkkkkkkkkkkkkkkkkkkkkkkk';

                          }

                  

               //return 'fine asa';

         }else if($semesterfeeeexpiredate == $mysemesterfeedate){


                        

                  if($student_give < $stufine_plustotal_amount){

              
                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                      
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                        // $semesterfeestatus = $semesterfee_status;
                          $studue = 'Due';

                           $fineduration = $fine_duration;


                  }else if($student_give == $stufine_plustotal_amount){

                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                      
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;

                          $fineduration = $fine_duration;
                       //  $semesterfeestatus = $semesterfee_status;
                         $studue = 'No Due';

                  }else if($student_give > $stufine_plustotal_amount){


                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                        
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                       //  $semesterfeestatus = $semesterfee_status;
                         $studue = 'No Due';

                          $fineduration = $fine_duration;

                  }else{

                          return 'rrrrrrrrkkkkkkkkkkkkkkkkkkkkkkkkk';

                  }



             //  return 'right date';

         }else if($semesterfeeeexpiredate > $mysemesterfeedate){



                    if($student_give < $stufine_plustotal_amount){

              
                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                    
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                       //  $semesterfeestatus = $semesterfee_status;
                          $studue = 'Due';

                           $fineduration = $fine_duration;


                  }else if($student_give == $mainsemester_fee){

                         $stumainsemesterfee = $mainsemesterfee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                      
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                       //  $semesterfeestatus = $semesterfee_status;
                         $studue = 'No Due';

                          $fineduration = $fine_duration;

                  }else if($student_give > $stufine_plustotal_amount){


                         $stumainsemesterfee = $mainsemester_fee;
                         $stugiveamount = $student_give;
                         $stufine = $stu_fine;
                         $stufineplustotalamount = $stufine_plustotal_amount;
                  
                         $stugiveextra = $stu_give_extra;
                         $duebalance = $loss_balance;
                         $givendate = $given_date;
                         $expiredate = $expire_date;
                       //  $semesterfeestatus = $semesterfee_status;
                         $studue = 'No Due';

                          $fineduration = $fine_duration;

                  }else{

                          return 'rrrrrrrrkkkkkkkkkkkkkkkkkkkkkkkkk';

                  }







              
              // return 'fine nai';


         }else{

               return 'ooooooooooooooooooo';

         }

 // return $check;
 //return $stuinfo;
   // return 'semester fee dis a';

   //return $givensemesterfeedate;

      // if($myexpiredate < $mysemesterfeedate){

          //  return "semester fee dai nai somoy moto";


       }else if(!$checksemesterfeegivenornot){

                
                if($semesterfeeeexpiredate < $mytoday){


                         $stumainsemesterfee = $mainsemesterfee;                       
                         $stugiveamount = 0;
                         $stufine = ($datedifference * 20);
                         $stufineplustotalamount = ($stumainsemesterfee + $stufine);
                         $stugiveextra = 0;
                         $duebalance = $stufineplustotalamount;
                         $givendate = 'Student Not Given';
                         $expiredate = $semesterfeelastdate;
                        // $semesterfeestatus = $semesterfee_status;
                         $studue = 'Due';

                          $fineduration = $datedifference;
                        // $stufinestatus = 'No Fine';

                   

                }else if($semesterfeeeexpiredate == $mytoday){

                        
                        $stumainsemesterfee = $mainsemesterfee;                       
                         $stugiveamount = 0;
                         $stufine = 0;
                         $stufineplustotalamount = ($stumainsemesterfee + $stufine);
                         $stugiveextra = 0;
                         $duebalance = $stufineplustotalamount;
                         $givendate = 'Student Not Given';
                         $expiredate = $semesterfeelastdate;
                         //$semesterfeestatus = $semesterfee_status;
                         $studue = 'Due';

                          $fineduration = $datedifference;
                         // $stufinestatus = 'No Fine';



                }else if($semesterfeeeexpiredate > $mytoday){

                         $stumainsemesterfee = $mainsemesterfee;                       
                         $stugiveamount = 0;
                         $stufine = 0;
                         $stufineplustotalamount = ($stumainsemesterfee + $stufine);
                         $stugiveextra = 0;
                         $duebalance = $stufineplustotalamount;
                         $givendate = 'Student Not Given';
                         $expiredate = $semesterfeelastdate;
                         //$semesterfeestatus = $semesterfee_status;
                         $studue = 'Due';

                          $fineduration = $datedifference;
                         //$stufinestatus = 'No Fine';



                }else{


                   return 'mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm';


                }

            //  return 'bal';







       }else{


       return "semester fee dai somoy ---------------------------moto";


       }    
       




               return response()->json([


                 'stumainsemesterfee'=>$stumainsemesterfee,
                 'stugiveamount'=>$stugiveamount,
                 'stufine'=>$stufine,
                 'stufineplustotalamount'=>$stufineplustotalamount,
                 'stugiveextra'=>$stugiveextra,
                 'duebalance'=>$duebalance,
                 'givendate'=>$givendate,
                 'expiredate'=>$expiredate,
                 'studue'=>$studue,
                 'my_student_info'=>$my_student_info,
                 'fineduration'=>$fineduration

            

               ],200);





     
   








}




//SemesterfeeController



public function addexamination(Request $request){

  
  $exmname = $request->exm_name;
  $dep = $request->exm_dep_id;
  $level = $request->exm_level_id;

   
   $check = Examination::where(['exm_name'=>$exmname,'exm_dep_id'=>$dep,'exm_level_id'=>$level])->first();
   

   $checkstatus = Examination::where(['exm_dep_id'=>$dep,'exm_level_id'=>$level,'exam_status'=>1])->first();

   if($check){

    return 0;

   }else if($checkstatus){





    return 11;




   }else{



      $exam = new Examination;
      $exam->exm_name = $request->exm_name;
      $exam->exm_dep_id = $request->exm_dep_id;
      $exam->exm_level_id = $request->exm_level_id;
      $exam->exam_date = $request->exam_date;
      $exam->save();
    
    return 1;

 

   }



}




//showallexamination

public function showallexamination(){


   //return Examination::get();
  $examination = DB::table('examinations')


         ->join('levels','examinations.exm_level_id','=','levels.level_id')
         ->join('departments','examinations.exm_dep_id','=','departments.department_id')     
         ->get();


         return $examination;

      

}




//deleteexam

public function deleteexam($exm_id){


Examination::where(['exm_id'=>$exm_id])->delete();



}



//editexaminationplaceholdervalue

public function editexaminationplaceholdervalue($exm_id){



  return Examination::where(['exm_id'=>$exm_id])->first();


}


//updateexamination


public function updateexamination(Request $request,$exm_id){


  $data = $request->all();

  Examination::where(['exm_id'=>$exm_id])->update(['exm_name'=>$data['exm_name'],'exm_dep_id'=>$data['exm_dep_id'],'exm_level_id'=>$data['exm_level_id'],'exam_date'=>$data['exam_date']]);

   return 1;


}

//showexamnameinform

public function showexamnameinform($addstuent_courseid){





   $courseinfo = Addstudentcourse::where(['addstuent_courseid'=>$addstuent_courseid])->first();



   $course_id = $courseinfo->semester_courseid;



   $mycourseinfo = Course::where(['course_id'=>$course_id])->first();



    $dptid = $mycourseinfo->dept_id;

    $levelid = $mycourseinfo->lev_id;



   //return $mycourseinfo;



   // $course_dpt_id = $courseinfo->dept_id;
   
   $examination = Examination::where(['exm_dep_id'=>$dptid,'exm_level_id'=>$levelid,'exam_status'=>1])->get();

  //return $examination;


 //  return $courseinfo;



                return response()->json([

                 'examination'=>$examination
            //   'courseinfo'=>$courseinfo
              

                  ],200);



}






}



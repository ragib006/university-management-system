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

use App\Admissionapply;

use App\Studentgivessemesterfee;

use App\Maritrange;


use App\Course;
use App\Examination;

use App\Addadmissionexam;


use App\Admissionresult;

use App\Adminlogin;


use App\Notice;


use DB;
use DateTime;
Use Image;

use Session;
session_start();

class ExaminationController extends Controller
{
    



public function showmyallexamination(){   



  $allexam = DB::table('examinations')


         ->join('levels','examinations.exm_level_id','=','levels.level_id')
         ->join('departments','examinations.exm_dep_id','=','departments.department_id')     
         ->get();


         return $allexam;



}



//showallresultexamwise

public function showallresultexamwise($exm_id){


    $examinfo = Examination::where(['exm_id'=>$exm_id])->first();

    $department = $examinfo->exm_name;



$result = DB::table('universitysemesterfinalresults')


         ->join('levels','universitysemesterfinalresults.university_semesterfinal_level_id','=','levels.level_id')
          ->join('addstudents','universitysemesterfinalresults.university_semesterfinal_student_id','=','addstudents.student_id')

         ->join('departments','universitysemesterfinalresults.university_semesterfinal_department_id','=','departments.department_id')   

      ->join('examinations','universitysemesterfinalresults.university_semesterfinal_exam_id','=','examinations.exm_id')  
         ->where('university_semesterfinal_exam_id',$exm_id) 
         ->get();


   return response()->json([

    'result'=>$result,
    'department'=>$department

  

    ],200);



 //return $examinfo;



}


//showoneonestudent

public function showoneonestudent(){


$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
          //  ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-1/1')
           ->where('department_name','CSE')

             ->get();


  return $students;


}





//addadmissionexam


public function addadminadmissionexam(Request $request){

        $data = $request->all();

        $year = date("Y");


        $name = $request->admissionexam_name;
        $examdate = $request->admission_test_date; 
        $applyinglastdate = $request->admission_applying_last_date;
        $exammark = $request->admission_exam_mark;

  //$check = Addadmissionexam::where(['admissionexam_name'=> $data['admissionexam_name']])->first();

  $check = DB::table('addadmissionexams')->where('admissionexam_name',$name)->first();

  if($check){

    return 0;


  }else{

   // $data = $request->all();
     $todaydate = date("d-m-Y");

    $batch = new Addadmissionexam;
    $batch->admissionexam_name = $name;
    $batch->admission_test_date = $examdate;
    $batch->admission_applying_last_date = $applyinglastdate;
    $batch->admission_test_year = $year;
    $batch->admission_exam_mark = $exammark;
   // $batch->batch_added_date = $todaydate;
    $batch->save();
    return 1;


       }



}


//showalladmissionexam

public function showalladmissionexam(){

    
    $alladmission = Addadmissionexam::get();


    return $alladmission;


 }



//editadmissionexamplaceholdervalue


 public function editadmissionexamplaceholdervalue($admissionexam_id){


   return Addadmissionexam::where(['admissionexam_id'=>$admissionexam_id])->first();


 }

//editadmissionexamplaceholdervalue

 public function updateadmissionexam(Request $request,$admissionexam_id){

     
     $data = $request->all();


     Addadmissionexam::where(['admissionexam_id'=>$admissionexam_id])->update(['admissionexam_name'=>$data['admissionexam_name'],'admission_test_date'=>$data['admission_test_date'],'admission_applying_last_date'=>$data['admission_applying_last_date'],'admission_test_year'=>$data['admission_test_year'],'admission_exam_mark'=>$data['admission_exam_mark']]);

     return 0;


 }


 //addmissionapplyformaction


 public function addmissionapplyformaction(Request $request){


         $data = $request->all();






         $admissionexamid = $request->admission_exam_id;

         $applysscroll = $request->apply_student_ssc_roll;

         $applyhscroll = $request->apply_student_hsc_roll;

         $applysscyear = $request->apply_student_ssc_pass_year;

         $applyhscyear = $request->apply_student_hsc_pass_year;

         $password =md5($request->apply_student_password);


          $paymenttype = $request->apply_student_payment_type;

          $txnid = $request->apply_payment_tax_id;




        $admissioninfo = Addadmissionexam::where(['admissionexam_id'=> $admissionexamid])->first();


        
        $applyinglastdate = $admissioninfo->admission_applying_last_date;



     $today = date("d-m-Y");




    $applylastdate = strtotime($applyinglastdate);

    $mytoday = strtotime($today);


        $year = date("Y");



  $check = Admissionapply::where(['apply_student_ssc_roll'=>$applysscroll,'apply_student_hsc_roll'=>$applyhscroll,'apply_student_ssc_pass_year'=>$applysscyear,'apply_student_hsc_pass_year'=>$applyhscyear])->first();



  if($check){


         // return 'This Candids Already Apply';

    return -1;


  }else{

           
           if($applylastdate < $mytoday){

              
             // return 'applying date is over';

            return -2;



           }else{




                     $maxnumber = DB::table('admissionapplies')
                    ->max('apply_student_id');






              $strpos = strpos($request->apply_student_image, ';');
              $sub = substr($request->apply_student_image,0,$strpos);
              $ex = explode('/',$sub)[1];
              $name = time().".".$ex;

              $img = Image::make($request->apply_student_image)->resize(400,400);
              $upload_path = public_path()."/images/";

              $img->save($upload_path.$name);



     
                     
                     $data = array();

                  // $todaydate = date("d-m-Y");
                  $data['admission_exam_id'] = $admissionexamid;
                  $data['apply_student_name'] = $request->apply_student_name;;
                  $data['apply_student_ssc_pass_year'] = $applysscyear;                 
                  $data['apply_student_ssc_roll'] = $applysscroll;

                  $data['apply_student_hsc_pass_year'] = $applyhscyear;
                  $data['apply_student_hsc_roll'] = $applyhscroll;

                  $data['apply_student_email'] = $request->apply_student_email;
                  $data['apply_student_password'] = $password;


                  $data['apply_student_date'] = $today;
                  $data['apply_student_year'] = $year;
                  $data['apply_student_image'] = $name;


                  $data['apply_student_payment_type'] = $paymenttype;
                  $data['apply_payment_tax_id'] = $txnid;
                  $data['apply_student_status'] = 0;
                  $data['apply_student_roll'] = ($maxnumber + 3000);

                 // apply_student_id




                    $applyerid = DB::table('admissionapplies')->insertGetId($data);

                  // $info = DB::table('admissionapplies')->where(['apply_student_id'=>$applyerid])->first();
                            Session::put('apply_student_id',$applyerid);
                          //  Session::put('customer_email',$request->customer_email);


                        return $applyerid;


                           
            

           }


        



  }


    

 }



//applyuserinformation



 public function applyuserinformation(){



//return $id;
            


         
           
               


  $applyid = Session::get('apply_student_id');



 // return $applyid;

           // return $id;
               $information = DB::table('admissionapplies')
              ->join('addadmissionexams','admissionapplies.admission_exam_id','=','addadmissionexams.admissionexam_id')
              ->where('apply_student_id',$applyid)
             // ->where('apply_student_status',1)
              ->get();


              // return $information;
            return response()->json([

                'information'=>$information
               // 'shippingid'=>$shippingid



          ],200);


        // return $information;



 }



// Route::get('/apply_user_information','ExaminationController@applyuserinformation');



 public function time(){

         $studentmaxlevel = DB::table('coursesemesterfinalmarks')
                 ->where('semester_final_student_id',$student_id)
                 ->max('semester_final_level_id');




 }




//allapplicantgetthereareapply

 public function allapplicantgetthereareapply($admissionexam_id){
               


               $admissioninfo =  DB::table('addadmissionexams')->where('admissionexam_id',$admissionexam_id)->first();
          
               $applicant = DB::table('addadmissionexams')

              ->join('admissionapplies','addadmissionexams.admissionexam_id','=','admissionapplies.admission_exam_id')
              ->where('admissionexam_id',$admissionexam_id)
              ->get();


                      return response()->json([

                'admissioninfo'=>$admissioninfo,
                'applicant'=>$applicant

              //  'shippingid'=>$shippingid



          ],200);



        
        return $applicant;

 }



//unsuccesspaymentsuccess


 public function unsuccesspaymentsuccess($apply_student_id){

         Admissionapply::where(['apply_student_id'=>$apply_student_id])->update(['apply_student_status'=>1]);

         return 1;
 

 }

//successpaymentununsuccess



 public function successpaymentununsuccess($apply_student_id){

         Admissionapply::where(['apply_student_id'=>$apply_student_id])->update(['apply_student_status'=>0]);

        return 0;
 }




//deleteapplicant


 public function deleteapplicant($apply_student_id){


   Admissionapply::where(['apply_student_id'=>$apply_student_id])->delete();

        return 0;




 }

//addmissionloginformaction


 public function addmissionloginformaction(Request $request){

         
              $email = $request->apply_students_email;
          
              $password =md5($request->apply_students_password);




  $result = DB::table('admissionapplies')->where(['apply_student_email'=>$email,'apply_student_password'=>$password])->first();


  if($result){


      Session::put('apply_student_id',$result->apply_student_id);

    return 11;


  }else{


    return 12;


  }





      //   return $password;



 }




//admissiontestresult

 public function admissiontestresult(Request $request){


   //$data=$request->all();
  $data=$request->stu_roll;

  //$stuexmid=$request->stu_roll->stu_roll;


 //return $data;

// return $data;

  //$sturoll = $data[0]->stu_roll;




  //  foreach($request->sturoll as $id){

  //   $data[]=[

  //   "user_id"=>$id,
  //    "attentdance"=>$request->attentdance[$id],
  //    "att_date"=>$request->att_date,
  //    "att_year"=>$request->att_year,
  //    "att_month"=>date("F")


  //   ];


  //  }



     $att=DB::table('admissionresults')->insert($data);


     return 1;


 // return $sturoll;

   //Admissionresult



 }







//viewmyspeceficexamresult

 public function viewmyspeceficexamresult($admissionexam_id){

   
 //  $examinfo = DB::table('addadmissionexams')->where('admissionexam_id',$admissionexam_id)->get();

   
   $examinfo = Addadmissionexam::where(['admissionexam_id'=>$admissionexam_id])->first();

  

               $examresult = DB::table('admissionresults')

             ->join('addadmissionexams','admissionresults.stu_exm_id','=','addadmissionexams.admissionexam_id')

              ->where('stu_exm_id',$admissionexam_id)

              ->orderBy('stu_exm_mark','desc')
              ->get();




          return response()->json([

                'examinfo'=>$examinfo,
                'examresult'=>$examresult



          ],200);



              //return $result;



 }




//addmissionsearchresultformaction



 public function addmissionsearchresultformaction(Request $request){

                 
               $roll = $request->apply_student_roll;
          
              $exmid =$request->admission_exam_id;




 // $result = DB::table('admissionapplies')->where(['apply_student_roll'=>$roll,'admission_exam_id'=>$exmid])->first();


  $result = Admissionapply::where(['apply_student_roll'=>$roll,'admission_exam_id'=>$exmid])->first();


  if($result){


      Session::put('apply_student_id',$result->apply_student_id);
      Session::put('apply_student_roll',$result->apply_student_roll);
      Session::put('admission_exam_id',$result->admission_exam_id);

    return 11;


   // return $result;


   // return 'success..............................';


  }else{


    return 12;

   // return 'sorry...................';


  }






 }




//applicantresultprofile

 public function applicantresultprofile(){



  $applyid = Session::get('apply_student_id');

  $roll = Session::get('apply_student_roll');

  $exmid = Session::get('admission_exam_id');





   $examinfo = DB::table('admissionapplies')

            ->join('addadmissionexams','admissionapplies.admission_exam_id','=','addadmissionexams.admissionexam_id')

            ->where('admission_exam_id',$exmid)

            ->where('apply_student_roll',$roll)

            ->first();
            









  //return $roll; 



   $applyinginfo = Admissionapply::where(['admission_exam_id'=>$exmid ,'apply_student_roll'=>$roll])->first();

   $resultinfo = Admissionresult::where(['stu_roll'=>$roll,'stu_exm_id'=>$exmid])->first();

   $studentgetmarkinadmission = $resultinfo->stu_exm_mark;


   $examinfo = Addadmissionexam::where(['admissionexam_id'=>$exmid])->first();

   $admissiontestmark = $examinfo->admission_exam_mark;




             $maritinfo = DB::table('maritranges')

            ->join('addadmissionexams','maritranges.marit_range_exam_id','=','addadmissionexams.admissionexam_id')
           
            ->get();
  //marit_range_exam_id 
          
          
            $Marit = $maritinfo[0]->marite_range;
            $Waiting = $maritinfo[1]->marite_range;
            $None = $maritinfo[2]->marite_range;








            
          if($studentgetmarkinadmission >= $Marit && $studentgetmarkinadmission <= $admissiontestmark){


                $meritstatus = 'Merit';

             //   $studentmark = $studentgetmarkinadmission;

        

          }else if($studentgetmarkinadmission >= $Waiting && $studentgetmarkinadmission < $Marit){


                $meritstatus = 'Waiting';
               
             //   $studentmark = $studentgetmarkinadmission;


          }else if($studentgetmarkinadmission >= $None && $studentgetmarkinadmission < $None){


                $meritstatus = 'N';


                  // $studentmark = $studentgetmarkinadmission;
          }

          else if($studentgetmarkinadmission < $None){


                 $meritstatus = 'F';

              //   $studentmark = $studentgetmarkinadmission;

            

          }




          
//return $studentgetmarkinadmission;


              // return $information;
         return response()->json([

              'applyinginfo'=>$applyinginfo,
              'meritstatus'=>$meritstatus,
              'studentgetmarkinadmission'=>$studentgetmarkinadmission,
              'examinfo'=>$examinfo




          ],200);





 }







//studentloginformaction


 public function studentloginformaction(Request $request){


        // $data = $request->all();


        // return $data;

       $stuemail = $request->student_email;
          
       $stupassword = md5($request->student_password);
       
       $check = Addstudent::where(['student_email'=>$stuemail,'student_password'=>$stupassword])->first();


       if($check){




      Session::put('student_id',$check->student_id);

    return 11;

          //  return 'email password right';


       }else{

   
      return 12;
            //  return 'email password wrong';

       }


       //return $stupassword;

      // ;





 }




//frontendstudentprofile


 public function frontendstudentprofile(){


         $studentid = Session::get('student_id');



  $student = DB::table('addstudents')

              ->join('departments','addstudents.student_department_id','=','departments.department_id')
              ->join('levels','addstudents.student_level_id','=','levels.level_id')
             // ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
              ->join('batches','addstudents.student_batch_id','=','batches.batch_id')
              ->where('student_id',$studentid)
              ->get();

    

   // return $student;

               return response()->json([

              'student'=>$student
             //  'hallname'=>$hallname

              ],200);






 }



//frontendstudentallsemesterfee


 public function frontendstudentallsemesterfee(){

          
         $studentid = Session::get('student_id');

         $studentinfo = Addstudent::where(['student_id'=>$studentid])->first();


         $studentroll = $studentinfo->student_roll;

         $studentdepartment = $studentinfo->student_department_id;





  $semesterfee = DB::table('studentgivessemesterfees')

              ->join('departments','studentgivessemesterfees.student_givesemesterfee_stuentdepartment','=','departments.department_id')
              ->join('levels','studentgivessemesterfees.student_givesemesterfee_stuentlevel','=','levels.level_id') 
             ->join('addstudents','studentgivessemesterfees.student_givesemesterfee_studentroll','=','addstudents.student_roll')
              ->where('student_givesemesterfee_studentroll',$studentroll)
              ->where('student_givesemesterfee_stuentdepartment',$studentdepartment)
              ->get();




    
           return response()->json([

              'semesterfee'=>$semesterfee
             //  'hallname'=>$hallname

              ],200);




      

 }




//frontendmystudensemesterfeedue

 public function frontendmystudensemesterfeedue(){


         $student_id = Session::get('student_id');
     




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




//frontendstudentcourse



 public function frontendstudentcourse(){   


        $student_id = Session::get('student_id');




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






//frontendstudentcoursectmark


 public function frontendstudentcoursectmark(Request $request,$addstuent_courseid){




        $student_id = Session::get('student_id');


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




               return response()->json([

                 'allctmarks'=>$allctmarks,
                'courseinfo'=>$courseinfo,
               'averagectmark'=>$averagectmark


              ],200);






 }









//frontendstudentcoursesemesterfinalmark


 public function frontendstudentcoursesemesterfinalmark($addstuent_courseid){

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





 }


//frontendstudentcourseattentdance


 public function frontendstudentcourseattentdance($addstuent_courseid){


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

     

 }


//frontendthisthissemesterfinalresult


 public function frontendthisthissemesterfinalresult(){



   $student_id = Session::get('student_id');


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









 }

//frontendallsemesterfinalresult



 public function frontendallsemesterfinalresult(){



   $student_id = Session::get('student_id');



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



      $cgpa = ($sumofcreditguncgpa/$sumoftotalcredit);

      $averagecpga = number_format($cgpa,2);



      return response()->json([

      'studentinfo'=>$studentinfo,
      'allresult'=>$allresult,
      'averagecpga'=>$averagecpga
      // 'studentsemesterfinalcoursemark'=>$studentsemesterfinalcoursemark

     ],200);









   


 }






//showonetwostudent


 public function showonetwostudent(){

$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
          //  ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-1/2')
           ->where('department_name','CSE')

             ->get();


  return $students;



 }



//showtwotwostudent

 public function showtwoonestudent(){


$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
          //  ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-2/1')
           ->where('department_name','CSE')

             ->get();


  return $students;





 }


//showtwotwostudent

 public function showtwotwostudent(){


$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
        //    ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-2/2')
           ->where('department_name','CSE')

             ->get();


  return $students;




 }


 //showthreeonestudent

 public function showthreeonestudent(){


$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
          // ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-3/1')
           ->where('department_name','CSE')

             ->get();


  return $students;





 }

//showthreetwostudent


 public function showthreetwostudent(){



$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
         //   ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-3/2')
           ->where('department_name','CSE')

             ->get();


  return $students;




 }

//showfouronestudent

 public function showfouronestudent(){



$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
           // ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-4/1')
           ->where('department_name','CSE')

             ->get();


  return $students;





 }

//showfourtwostudent');


public function showfourtwostudent(){

$students = DB::table('addstudents')

            ->join('departments','addstudents.student_department_id','=','departments.department_id')
            ->join('levels','addstudents.student_level_id','=','levels.level_id')
            ->join('addhallrooms','addstudents.student_hallroom_id','=','addhallrooms.hall_room_id')
          
            ->join('batches','addstudents.student_batch_id','=','batches.batch_id')

           ->where('level_name','CSE-4/2')
           ->where('department_name','CSE')

             ->get();


  return $students;





}





//examshowallmaritrange


public function examshowallmaritrange(){



$maritrange = DB::table('maritranges')

            ->join('addadmissionexams','maritranges.marit_range_exam_id','=','addadmissionexams.admissionexam_id')
           
            ->get();



      return response()->json([

      'maritrange'=>$maritrange
    //  'allresult'=>$allresult,
     // 'averagecpga'=>$averagecpga
      // 'studentsemesterfinalcoursemark'=>$studentsemesterfinalcoursemark

     ],200);



  //return $students;



//return 1;




}


//addadmissionexammaritrange

public function addadmissionexammaritrange(Request $request){

   
   $examid = $request->marit_range_exam_id;

   $maritetype = $request->marite_type;

   $maritrange = $request->marite_range;



//return $maritetype;

  // $check =  DB::table('maritranges')->where('marit_range_exam_id',$examid,'marite_type',$maritetype,'marite_type',$maritrange)->first();


$check = Maritrange::where(['marit_range_exam_id'=>$examid,'marite_type'=>$maritetype])->first();


   if($check){


      return 0;


   }else{


 // return 1;    

    $batch = new Maritrange;
    $batch->marit_range_exam_id = $examid;
    $batch->marite_type = $maritetype;
    $batch->marite_range = $maritrange;
    
    $batch->save();


   return 1;





   }




}



//delatemeritid

public function delatemeritid($marit_id){


Maritrange::where(['marit_id'=>$marit_id])->delete();

return 0;



}


//adminloginformaction


public function adminloginformaction(Request $request){


  $email = $request->admin_email;

   $password = md5($request->admin_password);

  //$check = Adminlogin


       
       $check = Adminlogin::where(['admin_email'=>$email,'admin_password'=>$password])->first();


       if($check){


              

             // return $check;

    Session::put('admin_id',$check->admin_id);

    return 11;

          //  return 'email password right';


       }else{

   
    //  return 'sorry not match;

        //  return 'email password wrong';

     return 12;   

       }



}



///


public function addnoticeformaction(Request $request){

    $data = $request->all();

    $todaydate = date("d-m-Y");


    $batch = new Notice;


    $batch->notice_title = $data['notice_title'];
    $batch->notice_description = $data['notice_description'];
    $batch->notice_date = $todaydate;
    $batch->save();
    return 1;



}


//showallnotice

public function showallnotice(){



   $allnotice =  Notice::get();


   return $allnotice;


}







//activenoticeunactive

public function activenoticeunactive($notice_id){

  Notice::where(['notice_id'=>$notice_id])->update(['notice_status'=>0]);

  return 1;


}


public function unactivenoticeactive($notice_id){



  Notice::where(['notice_id'=>$notice_id])->update(['notice_status'=>1]);

  return 0;


}


//editnoticeplaceholdervalue

public function editnoticeplaceholdervalue($notice_id){



 return Notice::where(['notice_id'=>$notice_id])->first();


}



public function updateniticefromaction(Request $request,$notice_id){

 $data = $request->all();
 Notice::where(['notice_id'=>$notice_id])->update(['notice_title'=>$data['notice_title'],'notice_description'=>$data['notice_description'],'notice_date'=>$data['notice_date']]);


          return 1;




}

//viewnoticedetails

public function viewnoticedetails($notice_id){


   $mynotice = Notice::where(['notice_id'=>$notice_id])->first();


         return response()->json([

      'mynotice'=>$mynotice
    //  'allresult'=>$allresult,
     // 'averagecpga'=>$averagecpga
      // 'studentsemesterfinalcoursemark'=>$studentsemesterfinalcoursemark

     ],200);



}


//delatenotice

public function delatenotice($notice_id){

Notice::where(['notice_id'=>$notice_id])->delete();


}

//showletestnoticefrontend

public function showletestnoticefrontend(){




         $allnotice = DB::table('notices')
              ->where('notice_status',1)
              ->orderBy('notice_id','desc')
              ->limit(5)

              ->get();




          return $allnotice;





}

//showallnoticefrontend



public function showallnoticefrontend(){


   $allnotice =  DB::table('notices')
              ->where('notice_status',1)
              ->get();


   return $allnotice;



}

//viewnoticedetailsfrontend


public function viewnoticedetailsfrontend($notice_id){

   $mynotice = Notice::where(['notice_id'=>$notice_id])->first();


         return response()->json([

      'mynotice'=>$mynotice
    //  'allresult'=>$allresult,
     // 'averagecpga'=>$averagecpga
      // 'studentsemesterfinalcoursemark'=>$studentsemesterfinalcoursemark

     ],200);


  
}


//overallinformation

public function overallinformation(){


   $studentcount = DB::table('addstudents')->count('student_id');

   $totaldepartment = DB::table('departments')->count('department_id');

   $totalteacher = DB::table('addteachers')->where('teacher_status',1)->count('teacher_id');

   $totalclassroom = DB::table('classrooms')->count('classroom_id');



         return response()->json([

       'studentcount'=>$studentcount,
       'totaldepartment'=>$totaldepartment,
       'totalteacher'=>$totalteacher,
        'totalclassroom'=>$totalclassroom

     ],200);



}

//admininfo


public function admininfo(){


 $adminid =  Session::get('admin_id');

  $admininfo = Adminlogin::where(['admin_id'=>$adminid])->first();


  //DB::table('adminlogins')->where('admin_id',$adminid)->first();



  return $admininfo;

      //  return response()->json([

      // 'admininfo'=>$admininfo
      

     //],200);



}



//adminlogout


public function adminlogout(){


 Session::forget('admin_id');

 return 1;


  
}






//deleteadminsemesterfinalresult


public function deleteadminsemesterfinalresult($universitysemesterfinalresultid){


 // DB::table('universitysemesterfinalresults')->where('university_semesterfinal_result_id',$universitysemesterfinalresultid)->delete();


Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->delete();

  return 1;


}


//activeexamunactive


public function activeexamunactive($exm_id){




Examination::where(['exm_id'=>$exm_id])->update(['exam_status'=>0]);

return 1;


}




public function unactiveexamactive($exm_id){


$info = Examination::where(['exm_id'=>$exm_id])->first();


$depid = $info->exm_dep_id;

$levelid = $info->exm_level_id;

$check = Examination::where(['exm_dep_id'=>$depid,'exm_level_id'=>$levelid,'exam_status'=>1])->first();

if($check){

   return 2;

}else{



Examination::where(['exm_id'=>$exm_id])->update(['exam_status'=>1]);

return 1;




}






}



//frontendsemestermarksheet

public function frontendsemestermarksheet($universitysemesterfinalresultid){


    
    $info = Universitysemesterfinalresult::where(['university_semesterfinal_result_id'=>$universitysemesterfinalresultid])->first();





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



//showstudentlibarybookfrontend



public function showstudentlibarybookfrontend(){


   $student_id = Session::get('student_id');

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




//studentviewlibarybookfinefrontend


public function studentviewlibarybookfinefrontend($studenttake_libary_book_id){



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

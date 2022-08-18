<?php

use Illuminate\Support\Facades\Route;





 Route::post('/admin_login_form_action','ExaminationController@adminloginformaction');

Route::get('/admin_dashboard','AdminController@admindashboard');

//
//
// //adddepartment_formaction
 Route::post('/adddepartment_formaction','DepartmentController@adddepartmentformaction');
// //show_all_department
Route::get('/show_all_department','DepartmentController@showalldepartment');
// //active_department_unactive
Route::get('/active_department_unactive/{department_id}','DepartmentController@activedepartmentunactive');
// //unactive_department_active
Route::get('/unactive_department_active/{department_id}','DepartmentController@unactivedepartmentactive');
// //delatedepartment
Route::get('/delatedepartment/{department_id}','DepartmentController@departmentdelate');
//edit_departmentplaceholder_value
Route::get('/edit_departmentplaceholder_value/{department_id}','DepartmentController@editdepartmentplaceholdervalue');
//update_department
Route::post('/update_department/{department_id}','DepartmentController@updatedepartment');
// //myallprofession
Route::get('/show_all_profession','ProfessionController@showallprofession');

 //show_all_department_in_form
 Route::get('/show_all_department_in_form','ProfessionController@showalldepartmentinform');


// //addprofession_formaction
 Route::post('/addprofession_formaction','ProfessionController@addprofessionformaction');
// //edit_professionplaceholder_value
Route::get('/edit_professionplaceholder_value/{profession_id}','ProfessionController@editprofessionplaceholdervalue');
//update_profession
Route::post('/update_profession/{profession_id}','ProfessionController@updateprofession');
//show_my_all_teacher
 Route::get('/show_my_all_teacher','TeacherController@showmyallteacher');
 //show_my_all_profession_addteacher
  Route::get('/show_my_all_profession_addteacher','TeacherController@showmyallprofessionaddteacher');

//show_all_department_in_add_teacher
 Route::get('/show_all_department_in_add_teacher','TeacherController@showalldepartmentinaddteacher');

 //addteacher_formaction
  Route::post('/addteacher_formaction','TeacherController@addteacherformaction');

//Route::get('/allteachershow','AdminController@allteachershow');
// //active_teacher_unactive
//
Route::get('/active_teacher_unactive/{teacher_id}','TeacherController@activeteacherunactive');
// //unactive_teacher_active
Route::get('/unactive_teacher_active/{teacher_id}','TeacherController@unactiveteacheractive');
// //edit_teacherplaceholder_value
 Route::get('/edit_teacherplaceholder_value/{teacher_id}','TeacherController@editteacherplaceholdervalue');
// //update_teacher
 Route::post('/update_teacher/{teacher_id}','TeacherController@updateteacher');
// //view_teacher_details
  Route::get('/view_teacher_details/{teacher_id}','TeacherController@viewteacherdetails');
// //show_all_teacher_in_form
Route::get('/show_all_teacher_in_add_level','LevelController@showallteacherinaddlevel');
//show all level
 Route::get('/show_all_level','LevelController@showalllevel');
 //show_all_department_in_add_level
  Route::get('/show_all_department_in_add_level','LevelController@showalldepartmentinaddlevel');
// //addlevel_formaction
Route::post('/addlevel_formaction','LevelController@addlevelformaction');
// //edit_levelplaceholder_value
Route::get('/edit_levelplaceholder_value/{level_id}','LevelController@editlevelplaceholdervalue');
// //update_level
Route::post('/update_level/{level_id}','LevelController@updatelevel');
// //delate_level
Route::get('/delate_level/{level_id}','LevelController@delatelevel');



Route::get('/show_all_classroom','ClassroomController@showallclassroom');
//addclassroom_formaction
Route::post('/addclassroom_formaction','ClassroomController@addclassroomformaction');
//edit_classroomplaceholder_value
Route::get('/edit_classroomplaceholder_value/{classroom_id}','ClassroomController@editclassroomplaceholdervalue');
//update_classroom

 Route::post('/update_classroom/{classroom_id}','ClassroomController@updateclassroom');

//show_all_classroom_in_add_level

Route::get('/show_all_classroom_in_add_level','LevelController@showallclassroominaddlevel');

//show_all_department_in_add_batch
Route::get('/show_all_department_in_add_batch','BatchController@showalldepartmentinaddbatch');

//show_all_batch
Route::get('/show_all_batch','BatchController@showallbatch');
//add_batch_formaction
Route::post('/add_batch_formaction','BatchController@addbatchformaction');
// //active_batch_unactive
 Route::get('/active_batch_unactive/{batch_id}','BatchController@activebatchunactive');
// //unactive_batch_active
 Route::get('/unactive_batch_active/{batch_id}','BatchController@unactivebatchactive');

 Route::get('/edit_batchplaceholder_value/{batch_id}','BatchController@editbatchplaceholdervalue');

 // //update_batch
  Route::post('/updatebatch/{batch_id}','BatchController@updatebatch');

  // //show_all_hall
  Route::get('/show_all_hall','HallController@showallhall');


  // //addhall_formaction
  Route::post('/addhall_formaction','HallController@addhallformaction');
  // //edit_hallplaceholder_value
  Route::get('/edit_hallplaceholder_value/{hall_id}','HallController@myedithallplaceholdervalue');
  // //update_hall
  Route::post('/update_hall/{hall_id}','HallController@updatehall');
  // //delate_hall
 Route::get('/delate_my_hall/{hall_id}','HallController@delatemyhall');
  //
  Route::get('/active_hall_unactive/{hall_id}','HallController@activehallunactive');
  // //unactive_batch_active
  Route::get('/unactive_hall_active/{hall_id}','HallController@unactivehallactive');





  // //add_hall_room
  Route::get('/show_myall_hallroom','HallController@showmyallhallroom');
  // //show_hall_in_select_form
  Route::get('/show_hall_in_select_form','HallController@showhallinselectform');
  // //addhall_room_formaction
  Route::post('/addhall_room_formaction','HallController@addhallroomformaction');
  // //show_all_hall_room
  // Route::get('/show_all_hall_room','HallController@showallhallroom');
  // //edit_hall_roomplaceholder_value
   Route::get('/edit_hall_roomplaceholder_value/{hall_room_id}','HallController@edithallroomplaceholdervalue');
  // //update_hall_room   update_hall_room
   Route::post('/update_hall_room/{hall_room_id}','HallController@updatehallroom');
  // //active_hallroom_unactive
  Route::get('/my_active_hallroom_unactive/{hall_room_id}','HallController@myactivehallroomunactive');
  //
  // //unactive_hallroom_active
  Route::get('/my_unactive_hallroom_active/{hall_room_id}','HallController@myunactivehallroomactive');
  // //delate_hall_room
  Route::get('/delate_hall_room/{hall_room_id}','HallController@delatehallroom');


  // //add_bus_formaction
  Route::post('/add_bus_formaction','HallController@addbusformaction');
  // //show_all_bus
  Route::get('/show_all_bus','HallController@showallbus');
  // //edit_busplaceholder_value
  Route::get('/edit_busplaceholder_value/{bus_id}','HallController@editbusplaceholdervalue');
  // //update_bus
  Route::post('/update_bus/{bus_id}','HallController@updatebus');
  // //my_active_bus_unactive
  Route::get('/my_active_bus_unactive/{bus_id}','HallController@myactivebusunactive');
  // //my_unactive_bus_active
  Route::get('/my_unactive_bus_active/{bus_id}','HallController@myunactivebusactive');




  //show_all_level_student_form
  Route::get('/show_all_level_student_form','StudentController@showalllevelstudentform');
  //show_all_batch_student_form
  Route::get('/show_all_batch_student_form','StudentController@showallbatchstudentform');
  //show_all_bus_student_form
  Route::get('/show_all_bus_student_form','StudentController@showallbusstudentform');
 //show_all_hallroom_student_form
  Route::get('/show_all_hallroom_student_form','StudentController@showallhallroomstudentform');
  //show_all_department_in_addstudent_form
  Route::get('/show_all_department_in_addstudent_form','StudentController@showalldepartmentinaddstudentform');
  //add_student_formaction
  Route::post('/update_bus/{bus_id}','HallController@updatebus');
 //add_student_formaction
  Route::post('/add_student_formaction','StudentController@addstudentformaction');
  //all_student_show
  Route::get('/all_student_show','StudentController@allstudentshow');



  // //active_student_unactive
  Route::get('/active_student_unactive/{student_id}','StudentController@activestudentunactive');
  // //unactive_student_active
  Route::get('/unactive_student_active/{student_id}','StudentController@unactivestudentactive');
  // //delate_student
  Route::get('/delate_student/{student_id}','StudentController@delatestudent');
  // //studentsearch
  Route::get('/studentsearch','StudentController@mysearchstudent');
  // //edit_studentplaceholder_value
  Route::get('/edit_studentplaceholder_value/{student_id}','StudentController@editmystudentplaceholdervalue');
  // //update_student
  Route::post('/update_student/{student_id}','StudentController@updatestudent');
  //view_student_details
  Route::get('/view_my_student_details/{student_id}','StudentController@viewmystudentdetails');

  Route::post('/add_libarybook_formaction','LibaryController@addlibarybookformaction');
  // //display_all_libary_book
  Route::get('/display_all_libary_book','LibaryController@displayalllibarybook');
  // //delate_libary_book
  Route::get('/delate_libary_book/{libary_book_id}','LibaryController@delatelibarybook');
  //
  Route::get('/edit_libarybook_value/{libary_book_id}','LibaryController@editlibarybookplaceholdervalue');
  //update_libary_book
  Route::post('/update_libary_book/{libary_book_id}','LibaryController@updatelibarybook');
  // //searchbook
  Route::get('/searchbook','LibaryController@searchlibarybook');
  //add_student_take_libarybook_formaction
  Route::post('/add_student_take_libarybook_formaction/{libary_book_id}','LibaryController@addstudenttakelibarybookformaction');

  //show_student_who_take_book

  Route::get('/show_student_who_take_book/{libary_book_id}','LibaryController@showstudentwhotakebook');
  //edit_studenttke_libarybook_placeholdervalue
  Route::get('/edit_studenttke_libarybook_placeholdervalue/{studenttake_libary_book_id}','LibaryController@editstudenttkelibarybookplaceholdervalue');
  //update_student_take_libary_book
  Route::post('/update_student_take_libary_book/{studenttake_libary_book_id}','LibaryController@updatestudenttakelibarybook');
  //view_student_take_libary_book
  Route::get('/viewstudent_take_libary_book/{studenttake_libary_book_id}','LibaryController@viewstudenttakelibarybook');
  //libart_book_return
  Route::post('/libart_book_return','LibaryController@libartbookreturn');
  //show_all_success_book
  Route::get('/show_all_success_book','LibaryController@showallsuccessbook');
  //viewstudent_return_success_libary_book
  Route::get('/viewstudent_return_success_libary_book/{studenttake_libary_book_id}','LibaryController@viewstudentreturnsuccesslibarybook');
 //show_all_pending_book
   Route::get('/show_all_pending_book','LibaryController@showallpendingbook');
 //delate_success_libary_book
  Route::get('/delate_success_libary_book/{studenttake_libary_book_id}','LibaryController@delatesuccesslibarybook');
  //show_all_libary_book_fine_student

  Route::get('/show_all_libary_book_fine_student','LibaryController@showalllibarybookfinestudent');
//delate_fine_book
  Route::get('/delate_fine_book/{libarybook_fine_taka_id}','LibaryController@delatefinebook');
//show_all_libary_book_student_take
  Route::get('/show_all_libary_book_student_take/{student_id}','LibaryController@showalllibarybookstudenttake');
//view_student_take_libary_book_and_fine
  Route::get('/view_student_take_libary_book_and_fine/{studenttake_libary_book_id}','LibaryController@viewstudenttakelibarybookandfine');



   //show_all_level_in_add_course_form
  Route::get('/show_all_level_in_add_course_form','CourseController@showalllevelinaddcourseform');

   //show_all_course
  // Route::get('/show_all_course','CourseController@showallcourse');
  // //show_all_department_in_add_course_form
 Route::get('/show_all_department_in_add_course_form','CourseController@showalldepartmentinaddcourseform');
  // //show_all_semester_in_add_course_form
  // Route::get('/show_all_semester_in_add_course_form','CourseController@showallsemesterinaddcourseform');
  // //show_all_teacher_in_add_course_form
 Route::get('/show_all_teacher_in_add_course_form','CourseController@showallteacherinaddcourseform');

 //display_myall_courses
 Route::get('/display_myall_courses','CourseController@displaymyallcourses');
//show_all_classroom_in_add_course_form
 Route::get('/show_all_classroom_in_add_course_form','CourseController@showallclassroominaddcourseform');
 // //add_course_formaction
  Route::post('/add_course_formaction','CourseController@addcourseformaction');

  //view_course_details
  Route::get('/view_course_details/{course_id}','CourseController@viewcoursedetails');

  //delete_course

 Route::get('/delete_course/{course_id}','CourseController@deletecourse');
 // //edit_courseplaceholder_value
 Route::get('/edit_courseplaceholder_value/{course_id}','CourseController@editcourseplaceholdervalue');
 // //update_course
 Route::post('/update_course/{course_id}','CourseController@updatecourseformaction');

//showmy_student_all_course
 Route::get('/showmy_student_all_course/{student_id}','CourseController@showmystudentallcourse');

 // //my_select_course
 //
 Route::post('/my_select_course/{student_id}','CourseController@myselectcourse');
//display_my_dpt_course


 Route::get('/display_my_dpt_course/{student_id}','CourseController@displaymydptcourse');

//delete_student_department_course

 Route::get('/delete_student_department_course/{addstuent_courseid}','CourseController@deletestudentdepartmentcourse');


 Route::post('/my_course_attendance_form_action/{course_id}','CourseController@mycourseattendanceformaction');

 Route::get('/show_all_course_attentdance_taker_student/{course_id}','CourseController@showallcourseattentdancetakerstudent');


 //view_my_course_attentdance

 Route::get('/view_my_course_attentdance/{addstuent_courseid}','CourseController@viewmycourseattentdance');

 //delate_student_present_attentdance

 Route::get('/delate_student_present_attentdance/{addstuent_courseid}','CourseController@delatestudentpresentattentdance');




 // //add_ct_mark_form_action

 Route::post('/add_ct_mark_form_action/{addstuent_courseid}','StudentctController@addctmarkformaction');

 // //show_all_ct_martks
 //
Route::get('/show_all_ct_martks/{addstuent_courseid}','StudentctController@showallctmartks');
 //
 // //delate_ct_mark
Route::get('/delate_ct_mark/{ct_id}','StudentctController@delatectmark');

// //add_semester_final_mark_form_action

Route::post('/add_semester_final_mark_form_action/{addstuent_courseid}','StudentsemesterfinalController@addsemesterfinalmarkformaction');
//show_semester_final_course_mark
Route::get('/show_semester_final_course_mark/{addstuent_courseid}','StudentsemesterfinalController@showsemesterfinalcoursemark');

// //show_semester_final_course_mark
// Route::get('/show_semester_final_course_mark/{addstuent_courseid}','AdminController@showsemesterfinalcoursemark');
//
// //delate_course_femester_final_mark
Route::get('/delate_course_femester_final_mark/{semesterfinal_id}','StudentsemesterfinalController@delatecoursefemesterfinalmark');

//show_student_all_semester_final_course_result

 Route::get('/show_student_all_semester_final_course_result/{student_id}','StudentsemesterfinalController@showstudentallsemesterfinalcourseresult');


//result_publish_formction

 Route::post('/result_publish_formction/{student_id}','StudentsemesterfinalController@resultpublishformction');

//student_semesterfinal_cgpa
 Route::get('/student_semesterfinal_cgpa/{student_id}','StudentsemesterfinalController@studentsemesterfinalcgpa');

// //student_semesterfinal_cgpa
//
Route::get('/show_student_allsemester_final_result_and_cgpa/{student_id}','StudentsemesterfinalController@showstudentallsemesterfinalresultandcgpa');


// //add_student_give_semester_fee_amount
//
Route::post('/add_student_give_semester_fee_amount','SemesterfeeController@addstudentgivesemesterfeeamount');

//all_level_show_in_tution_fee

Route::get('/all_level_show_in_tution_fee','SemesterfeeController@alllevelshowintutionfee');

//adddepartment_tution_fee_formaction

Route::post('/adddepartment_tution_fee_formaction','SemesterfeeController@adddepartmenttutionfeeformaction');

//show_all_department_in_add_teacher

Route::get('/show_all_department_tution_fee','SemesterfeeController@showalldepartmenttutionfee');

//show_all_department_in_from

Route::get('/show_all_department_in_from','SemesterfeeController@showalldepartmentinfrom');

//edit_departmenttutionfeeplaceholder_value

Route::get('/edit_departmenttutionfeeplaceholder_value/{department_tution_fee_id}','SemesterfeeController@editdepartmenttutionfeeplaceholdervalue');

 //update_department_tution_fee
Route::post('/update_department_tution_fee/{department_tution_fee_id}','SemesterfeeController@updatedepartmenttutionfee');

//add student gives semester Fee






Route::get('/show_all_student_given_semester_fee','SemesterfeeController@showallstudentgivensemesterfee');

 Route::get('/edit_student_all_semesterfee_placeholder_value/{student_givesemesterfee_id}','SemesterfeeController@editstudent_allsemesterfeeplaceholdervalue');

Route::post('/update_student_semester_fee/{student_givesemesterfee_id}','SemesterfeeController@updatestudentsemesterfee');

Route::get('/delate_student_semeter_fee/{student_givesemesterfee_id}','SemesterfeeController@delatestudentsemeterfee');


Route::post('/add_student_give_semester_fee_amount','SemesterfeeController@addstudentgivesemesterfeeamount');

 Route::get('/view_specificstudent_allsemesterfee/{student_id}','SemesterfeeController@viewspecificstudentallsemesterfee');


 Route::get('/view_specificstudent_allsemesterfee_due/{student_id}','SemesterfeeController@viewspecificstudentallsemesterfeedue');





 Route::post('/add_examination','SemesterfeeController@addexamination');
 Route::get('/show_all_examination','SemesterfeeController@showallexamination');

 Route::get('/delate_exam/{exm_id}','SemesterfeeController@deleteexam');

 Route::get('/edit_examinationplaceholder_value/{exm_id}','SemesterfeeController@editexaminationplaceholdervalue');

 Route::post('/update_examination/{exm_id}','SemesterfeeController@updateexamination');

//show_exam_name_in_form

  Route::get('/show_exam_name_in_form/{addstuent_courseid}','SemesterfeeController@showexamnameinform');

 //Route::get('/view_specificstudent_allsemesterfee/{student_id}','AdminController@viewspecificstudentallsemesterfee');


//show_universitysemester_final_specefic_result

  Route::get('/show_universitysemester_final_specefic_result/{result_id}','StudentsemesterfinalController@showuniversitysemesterfinalspeceficresult');

//

  Route::get('/show_myall_examination','ExaminationController@showmyallexamination');


//show_all_result_exam_wise

  Route::get('/show_all_result_exam_wise/{exm_id}','ExaminationController@showallresultexamwise');

///show_one_one_student

  Route::get('/show_one_one_student','ExaminationController@showoneonestudent');







  Route::post('/add_admin_admission_exam','ExaminationController@addadminadmissionexam');

  Route::get('/show_all_admission_exam','ExaminationController@showalladmissionexam');

  Route::get('/edit_admissionexamplaceholder_value/{admissionexam_id}','ExaminationController@editadmissionexamplaceholdervalue');

 Route::post('/update_admission_exam/{admissionexam_id}','ExaminationController@updateadmissionexam');



 Route::post('/addmission_apply_form_action','ExaminationController@addmissionapplyformaction');


 Route::get('/apply_user_information','ExaminationController@applyuserinformation');





 Route::get('/all_applicant_get_there_are_apply/{admissionexam_id}','ExaminationController@allapplicantgetthereareapply');





 Route::get('/unsuccess_payment_success/{apply_student_id}','ExaminationController@unsuccesspaymentsuccess');


 Route::get('/success_paymentun_unsuccess/{apply_student_id}','ExaminationController@successpaymentununsuccess');

//delete_applicant

 Route::get('/delete_applicant/{apply_student_id}','ExaminationController@deleteapplicant');

//addmission_login_form_action


 Route::post('/my_addmission_login_form_action','ExaminationController@addmissionloginformaction');

//admission_test_result


 Route::post('/admission_test_result','ExaminationController@admissiontestresult');



 Route::get('/view_my_specefic_exam_result/{admissionexam_id}','ExaminationController@viewmyspeceficexamresult');


//addmission_search_result_form_action


 Route::post('/addmission_search_result_form_action','ExaminationController@addmissionsearchresultformaction');


//applicant_result_profile


 Route::get('/applicant_result_profile','ExaminationController@applicantresultprofile');



 Route::get('/time','ExaminationController@time');



 //Route::post('/my','ExaminationController@my');

 Route::post('/student_login_form_action','ExaminationController@studentloginformaction');


//frontend_student_profile

 Route::get('/frontend_student_profile','ExaminationController@frontendstudentprofile');

 Route::get('/frontend_student_all_semester_fee','ExaminationController@frontendstudentallsemesterfee');

//frontend_mystudent_semester_fee_due
 
 Route::get('/frontend_mystudent_semester_fee_due','ExaminationController@frontendmystudensemesterfeedue');

//


 Route::get('/frontend_student_course','ExaminationController@frontendstudentcourse');



 Route::get('/frontend_student_course_ct_mark/{addstuent_courseid}','ExaminationController@frontendstudentcoursectmark');

//frontend_student_course_semesterfinal_mark


 Route::get('/frontend_student_course_semesterfinal_mark/{addstuent_courseid}','ExaminationController@frontendstudentcoursesemesterfinalmark');


//frontend_student_course_attentdance


 Route::get('/frontend_student_course_attentdance/{addstuent_courseid}','ExaminationController@frontendstudentcourseattentdance');

//frontend_this_thissemester_final_result

 Route::get('/frontend_this_thissemester_final_result','ExaminationController@frontendthisthissemesterfinalresult');



 Route::get('/frontend_all_semester_final_result','ExaminationController@frontendallsemesterfinalresult');



 Route::get('/show_one_two_student','ExaminationController@showonetwostudent');

 Route::get('/show_two_one_student','ExaminationController@showtwoonestudent');
 
 Route::get('/show_two_two_student','ExaminationController@showtwotwostudent');

 Route::get('/show_three_one_student','ExaminationController@showthreeonestudent');

 Route::get('/show_three_two_student','ExaminationController@showthreetwostudent');


 Route::get('/show_four_one_student','ExaminationController@showfouronestudent');

 Route::get('/show_four_two_student','ExaminationController@showfourtwostudent');


//exam_show_all_marit_range

 Route::get('/exam_show_all_marit_range','ExaminationController@examshowallmaritrange');

  Route::post('/add_admission_exam_marit_range','ExaminationController@addadmissionexammaritrange');

 Route::get('/delate_merit_id/{marit_id}','ExaminationController@delatemeritid');

//add_notice_formaction

   Route::post('/add_notice_formaction','ExaminationController@addnoticeformaction');

//show_all_notice


 Route::get('/show_all_notice','ExaminationController@showallnotice');


//
//active_notice_unactive
 Route::get('/active_notice_unactive/{notice_id}','ExaminationController@activenoticeunactive');

//unactive_notice_active

 Route::get('/unactive_notice_active/{notice_id}','ExaminationController@unactivenoticeactive');

//edit_notice_placeholder_value

  Route::get('/edit_notice_placeholder_value/{notice_id}','ExaminationController@editnoticeplaceholdervalue');

//update_nitice_from_action


  Route::post('/update_nitice_from_action/{notice_id}','ExaminationController@updateniticefromaction');

//view_notice_details

   Route::get('/view_notice_details/{notice_id}','ExaminationController@viewnoticedetails');

   //delate_notice


   Route::get('/delate_notice/{notice_id}','ExaminationController@delatenotice');


   //show_letest_notice_frontend


   Route::get('/show_letest_notice_frontend','ExaminationController@showletestnoticefrontend');

   //show_letest_notice_frontend

      Route::get('/show_all_notice_frontend','ExaminationController@showallnoticefrontend');

      //view_notice_details_frontend


         Route::get('/view_notice_details_frontend/{notice_id}','ExaminationController@viewnoticedetailsfrontend');

//frontend_student_course_semesterfinal_mark



   Route::get('/over_all_information','ExaminationController@overallinformation');


   Route::get('/admin_info','ExaminationController@admininfo');

//admin_logout

   Route::get('/admin_logout','ExaminationController@adminlogout');


 Route::get('/delete_admin_semester_final_result/{universitysemesterfinalresultid}','ExaminationController@deleteadminsemesterfinalresult');



//active_exam_unactive

 Route::get('/active_exam_unactive/{exm_id}','ExaminationController@activeexamunactive');


 //unactive_exam_active
 Route::get('/unactive_exam_active/{exm_id}','ExaminationController@unactiveexamactive');


//frontend_semester_mark_sheet

 Route::get('/frontend_semester_mark_sheet/{universitysemesterfinalresultid}','ExaminationController@frontendsemestermarksheet');


//show_student_libary_book_frontend

 Route::get('/show_student_libary_book_frontend','ExaminationController@showstudentlibarybookfrontend');

//student_view_libary_book_fine_frontend

  Route::get('/student_view_libary_book_fine_frontend/{studenttake_libary_book_id}','ExaminationController@studentviewlibarybookfinefrontend');

// //addteacher_formaction
// Route::post('/addteacher_formaction','AdminController@addteacherformaction');
// //allteachershow


// //addsemeter_formaction
// Route::post('/addsemeter_formaction','AdminController@addsemeterformaction');
// //show_all_semester
// Route::get('/show_all_semester','AdminController@allsemester');
// //delate_semester
// Route::get('/delate_semester/{semester_id}','AdminController@delatesemester');


// //delate_teacher
// Route::get('/delate_teacher/{teacher_id}','AdminController@delateteacher');

// //show_all_batch
// Route::get('/show_all_batch','AdminController@showallbatch');
// //add_batch_formaction
// Route::post('/add_batch_formaction','AdminController@addbatchformaction');
// //edit_batchplaceholder_value
// Route::get('/edit_batchplaceholder_value/{batch_id}','AdminController@editbatchplaceholdervalue');

// //active_batch_unactive
// Route::get('/active_batch_unactive/{batch_id}','AdminController@activebatchunactive');
// //unactive_batch_active
// Route::get('/unactive_batch_active/{batch_id}','AdminController@unactivebatchactive');
// //edit_departmentplaceholder_value
// //edit_departmentplaceholder_value
// Route::get('/edit_departmentplaceholder_value/{department_id}','AdminController@editdepartmentplaceholdervalue');
// //update department   update_department
// Route::post('/update_department/{department_id}','AdminController@update_department');
//



//
// //show_all_level
//


//

// //show_all_level_student_form
// Route::get('/show_all_level_student_form','AdminController@showalllevelstudentform');
// //show_all_hallroom_student_form
// Route::get('/show_all_hallroom_student_form','AdminController@showallhallroomstudentform');
// //show_all_bus_student_form
// Route::get('/show_all_bus_student_form','AdminController@showallbusstudentform');
// //show_all_department_in_addstudent_form
// Route::get('/show_all_department_in_addstudent_form','AdminController@showalldepartmentinaddstudentform');
// //show_all_batch_student_form
// Route::get('/show_all_batch_student_form','AdminController@showallbatchstudentform');
// //add_student_formaction
// Route::post('/add_student_formaction','AdminController@addstudentformaction');


// //view_my_student_coure_match_semester
// Route::get('/view_my_student_coure_match_semester/{student_id}','AdminController@viewmystudentcourematchsemester');
// //show_my_course_code
// Route::get('/show_my_course_code/{course_id}','AdminController@showmycoursecode');
// //add_student_markes
// // Route::post('/add_student_markes/{course_id}','AdminController@addstudentmarkes');
//
// Route::get('/ragib_course_name_show/{course_id}','AdminController@ragibcoursenameshow');
//
// //allcoursestudent
// Route::get('/show_all_course_attentdance_taker_student/{course_id}','AdminController@showallcourseattentdancetakerstudent');
//
// //add_course_attentdance_form_action
//
// Route::post('/add_course_attentdance_form_action/{student_id}','AdminController@addcourseattentdanceformaction');
//
//  //my_data
//  Route::post('/my_course_attendance_form_action/{course_id}','AdminController@mycourseattendanceformaction');
//
// //view_all_course_attentdance
//
// Route::get('/view_all_course_attentdance/{course_id}','AdminController@viewallcourseattentdance');
//
// //view_course_attentdance
// Route::get('/view_course_attentdance/{course_attent_date}','AdminController@viewcourseattentdance');
// //view_my_all_course_attentdance
//
// Route::get('/view_my_all_course_attentdance','AdminController@viewmyallcourseattentdance');

//
// //show_student_semester_course
//
// Route::get('/show_student_semester_course/{student_id}','AdminController@showstudentsemestercourse');
//
// //add_student_course_formaction
// Route::post('/add_student_course_formaction/{student_id}','AdminController@addstudentcourseformaction');
// //display_student__all_semester_course
//
// Route::get('/display_student__all_semester_course/{student_id}','AdminController@displaystudentallsemestercourse');
//

//
// //view_semester_wise_course
//
//
//
// Route::get('/show_student_semester_wise_course/{course_level_id}','AdminController@showstudentsemesterwisecourse');
// //student_level_show
//
// Route::get('/student_level_show/{student_id}','AdminController@studentlevelshow');
//
// //course_info_in_add_marks
// Route::get('/course_info_in_add_marks/{addstuent_courseid}','AdminController@courseinfoinaddmarks');
//
// //add_course_mark_form_action
// // Route::post('/add_course_mark_form_action/{addstuent_courseid}','AdminController@addcoursemarkformaction');
//


// //result_publish_formction
// Route::post('/result_publish_formction/{student_id}','AdminController@resultpublishformction');
//
// //result_pubsish_button_showornot
// Route::get('/view_studentall_semester_result/{student_id}','AdminController@viewstudentallsemesterresult');
//
// //see_student_sprcefic_course_ttentdance
// Route::get('/see_student_sprcefic_course_attentdance/{addstuent_courseid}','AdminController@seestudentsprceficcourseattentdance');
//
// //add_student_give_semester_fee_amount
//
// Route::post('/add_student_give_semester_fee_amount','AdminController@addstudentgivesemesterfeeamount');
//
// //all_student_give_semester_fee_show
// Route::get('/all_student_give_semester_fee_show','AdminController@allstudentgivesemesterfeeshow');
//
// //view_my_all_student_semesterfee_details
//
// Route::get('/view_my_all_student_semesterfee_details/{student_givesemesterfee_id}','AdminController@viewmyallstudentsemesterfeedetails');
//
// //edit_student_all_semesterfee_placeholder_value
//

//
// //update_student_semester_fee
//
// //
// //delate_student_semeter_fee
//
// Route::get('/delate_student_semeter_fee/{student_givesemesterfee_id}','AdminController@delatestudentsemeterfee');
//
// //studentsemesterfeesearch
//
// Route::get('/studentsemesterfeesearch','AdminController@allstudentsemesterfeesearch');
//
// //view_specificstudent_allsemesterfee
//
// Route::get('/view_specificstudent_allsemesterfee/{student_id}','AdminController@viewspecificstudentallsemesterfee');
//
//
//

//
// //add_student_take_libarybook_formaction
//
// Route::post('/add_student_take_libarybook_formaction/{libary_book_id}','AdminController@addstudenttakelibarybookformaction');
//
// //show_student_who_take_book
// Route::get('/show_student_who_take_book/{libary_book_id}','AdminController@showstudentwhotakebook');
//
// //view_student_take_book
// Route::get('/view_student_take_book/{studenttake_libary_book_id}','AdminController@viewstudenttakebook');
//
// //show_libary_book_add_student
// Route::get('/show_libary_book_add_student/{student_id}','AdminController@showlibarybookaddstudent');
//
// //view_student_take_libarybook_addstudent
//
// Route::get('/view_student_take_libarybook_addstudent/{studenttake_libary_book_id}','AdminController@viewstudenttakelibarybookaddstudent');
//
// //pending_book_success
// Route::get('/pending_book_success/{studenttake_libary_book_id}','AdminController@pendingbooksuccess');
//
// //success_book_pending
// Route::get('/success_book_pending/{studenttake_libary_book_id}','AdminController@successbookpending');
//
// //show_all_pending_book
// Route::get('/show_all_pending_book','AdminController@showallpendingbook');
//
// //delate_student_take_libarybook/'+studenttake_libary_book_id
// Route::get('/delate_student_take_libarybook/{studenttake_libary_book_id}','AdminController@delatestudenttakelibarybook');
//
// //show_all_success_book
// Route::get('/show_all_success_book','AdminController@showallsuccessbook');
//
// //libart_book_fine
//
// Route::post('/libart_book_fine','AdminController@libartbookfine');
//
//
// Route::get('/','AdminController@websitehome');



Route::get('/{any}', 'AdminController@admindashboard')->where('any', '.*');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

class DepartmentController extends Controller
{


public function showalldepartment(){

  return Department::get();

}

public function adddepartmentformaction(Request $request){

     $data = $request->all();

       $todaydate = date("d-m-Y");

     $check = Department::where(['department_name'=>$data['department_name']])->first();

     if($check){

       return 0;

     }else{

      $department = new Department;
      $department->department_name = $data['department_name'];
      $department->department_semester_fee = $data['department_semester_fee'];
      $department->deprtment_head = $data['deprtment_head'];
      $department->department_dean = $data['department_dean'];
      $department->department_added_date =  $todaydate;
      $department->save();

      return 1;


     }


}


//activedepartmentunactive

public function activedepartmentunactive($department_id){

Department::where(['department_id'=>$department_id])->update(['department_added_date_status'=>0]);
return 1;

}

//unactivedepartmentactive

public function unactivedepartmentactive($department_id){

Department::where(['department_id'=>$department_id])->update(['department_added_date_status'=>1]);
return 1;

}

//departmentdelate

public function departmentdelate($department_id){

Department::where(['department_id'=>$department_id])->delete();
return 1;

}

//editdepartmentplaceholdervalue

public function editdepartmentplaceholdervalue($department_id){

  return Department::where(['department_id'=>$department_id])->first();

}

//updatedepartment

public function updatedepartment(Request $request,$department_id){

  $data = $request->all();




Department::where(['department_id'=>$department_id])->update(['department_name'=>$data['department_name'],'department_semester_fee'=>$data['department_semester_fee'],'deprtment_head'=>$data['deprtment_head'],'deprtment_head'=>$data['deprtment_head'],'department_added_date'=>$data['department_added_date']]);

return 1;







}





}

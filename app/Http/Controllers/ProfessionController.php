<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;
use App\Department;
use DB;

class ProfessionController extends Controller
{


public function showallprofession(){

  $showallprofession=DB::table('professions')

              ->join('departments','professions.pro_department_id','=','departments.department_id')
               ->get();

               return response()->json([

               'showallprofession'=>$showallprofession

              ],200);


}

//showalldepartmentinform

public function showalldepartmentinform(){


   return Department::get();


}

//addprofessionformaction

public function addprofessionformaction(Request $request){

   $data = $request->all();

   $todaydate = date("d-m-Y");

 $check = Profession::where(['pro_department_id'=>$data['pro_department_id'],'Profession_name'=>$data['Profession_name']])->first();

 if($check){

   return 0;

 }else{

  $department = new Profession;
  $department->pro_department_id = $data['pro_department_id'];
  $department->Profession_name = $data['Profession_name'];
  $department->profession_salary = $data['profession_salary'];
  $department->profession_added_date =$todaydate;
  $department->save();

  return 1;


 }

}

 //editprofessionplaceholdervalue

 public function editprofessionplaceholdervalue($profession_id){


return Profession::where(['profession_id'=>$profession_id])->first();


}

//ProfessionController


public function updateprofession(Request $request,$profession_id){

$data = $request->all();

Profession::where(['profession_id'=>$profession_id])->update(['pro_department_id'=>$data['pro_department_id'],'Profession_name'=>$data['Profession_name'],'profession_salary'=>$data['profession_salary'],'profession_added_date'=>$data['profession_added_date']]);

return 1;

}

}

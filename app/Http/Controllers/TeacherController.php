<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use DB;
use DateTime;
Use Image;


class TeacherController extends Controller
{


public function showmyallteacher(){

  $showmyallteachers=DB::table('addteachers')

              ->join('departments','addteachers.dep_id','=','departments.department_id')
              ->join('professions','addteachers.proffe_id','=','professions.profession_id')


               ->get();

               return response()->json([

               'showmyallteachers'=>$showmyallteachers

              ],200);



}

//showmyallprofessionaddteacher


public function showmyallprofessionaddteacher(){


 return Profession::get();


}

//showalldepartmentinaddteacher

public function showalldepartmentinaddteacher(){


   return Department::get();

}

//addteacherformaction

public function addteacherformaction(Request $request){



        $data = $request->all();
        $todaydate = date("d-m-Y");

        $password = md5($request->teacher_passwoard);


  $check = Addteacher::where(['teacher_name'=>$data['teacher_name'],'dep_id'=>$data['dep_id'],'proffe_id'=>$data['proffe_id']])->first();


  if($check){

   return 0;


  }else{




      $strpos = strpos($request->teacher_image, ';');
      $sub = substr($request->teacher_image,0,$strpos);
      $ex = explode('/',$sub)[1];
      $name = time().".".$ex;

      $img = Image::make($request->teacher_image)->resize(400,400);
      $upload_path = public_path()."/images/";

      $img->save($upload_path.$name);

      $product = new Addteacher;

      $product->dep_id=$data['dep_id'];
      $product->teacher_name=$data['teacher_name'];
      $product->proffe_id =$data['proffe_id'];
      $product->teacher_email =$data['teacher_email'];
      $product->teacher_address =$data['teacher_address'];
      $product->teacher_district =$data['teacher_district'];
      $product->teacher_mobile_number =$data['teacher_mobile_number'];
      $product->teacher_description =$data['teacher_description'];
      $product->teacher_experience =$data['teacher_experience'];
      $product->teacher_passwoard = $password ;
      $product->teacher_added_date=$todaydate;
      $product->teacher_image = $name;
      $product->save();
      return 1;


  }


}

//editteacherplaceholdervalue

public function editteacherplaceholdervalue($teacher_id){


   return Addteacher::where(['teacher_id'=>$teacher_id])->first();


}

//updateteacher


public function updateteacher(Request $request,$teacher_id){

  $data = $request->all();

  $password = md5($request->teacher_passwoard);


    $post = Addteacher::where(['teacher_id'=>$teacher_id])->first();

  if($request->teacher_image!=$post->teacher_image){

    $strpos = strpos($request->teacher_image, ';');
    $sub = substr($request->teacher_image,0,$strpos);
    $ex = explode('/',$sub)[1];
    $name = time().".".$ex;

    $img = Image::make($request->teacher_image)->resize(400,400);
    $upload_path = public_path()."/images/";
    //$upload_path = public_path('images/customer/large/');
     $image = $upload_path.$post->teacher_image;
    $img->save($upload_path.$name);



    if(file_exists($image)){

        @unlink($image);


    }


  }else{

  $name = $post->teacher_image;


  }

 Addteacher::where(['teacher_id'=>$teacher_id])->update(['teacher_name'=>$data['teacher_name'],'dep_id'=>$data['dep_id'],'proffe_id'=>$data['proffe_id'],'teacher_email'=>$data['teacher_email'],'teacher_address'=>$data['teacher_address'],'teacher_district'=>$data['teacher_district'],'teacher_mobile_number'=>$data['teacher_mobile_number'],
 'teacher_description'=>$data['teacher_description'],'teacher_experience'=>$data['teacher_experience'],'teacher_passwoard'=>$password,'teacher_added_date'=>$data['teacher_added_date'],'teacher_image'=>$name]);



return 1;


}

//viewteacherdetails

public function viewteacherdetails($teacher_id){

  $teacherinformation=DB::table('addteachers')

              ->join('departments','addteachers.dep_id','=','departments.department_id')
              ->join('professions','addteachers.proffe_id','=','professions.profession_id')
              ->where('teacher_id',$teacher_id)
              ->first();


               return response()->json([

               'teacherinformation'=>$teacherinformation

              ],200);




}

//activeteacherunactive


public function activeteacherunactive($teacher_id){


    Addteacher::where(['teacher_id'=>$teacher_id])->update(['teacher_status'=>0]);


}


public function unactiveteacheractive($teacher_id){   


    Addteacher::where(['teacher_id'=>$teacher_id])->update(['teacher_status'=>1]);


}



}

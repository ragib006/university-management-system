<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use App\Level;
use App\Classroom;
use DB;
use DateTime;
Use Image;


class LevelController extends Controller
{


  public function showalllevel(){

    $showalllevel=DB::table('levels')

                ->join('departments','levels.dpt_myid','=','departments.department_id')
                ->join('addteachers','levels.tec_id_level_addvisor','=','addteachers.teacher_id')
                ->join('classrooms','levels.level_class_room','=','classrooms.classroom_id')


                 ->get();

                 return response()->json([

                 'showalllevel'=>$showalllevel

                ],200);

  }

  //showallteacherinaddlevel

  public function showallteacherinaddlevel(){

    return Addteacher::where(['teacher_status'=>1])->get();



  }

  //showalldepartmentinaddlevel

  public function showalldepartmentinaddlevel(){

    return Department::get();

  }

  //addlevelformaction

  public function addlevelformaction(Request $request){


    $data = $request->all();


    $check = Level::where(['level_name'=>$data['level_name']])->first();

    if($check){



    return 0;



    }else{


      $level = new Level;

      $level->dpt_myid = $data['dpt_myid'];
      $level->level_dpt_tution_free = $data['level_dpt_tution_free'];
      $level->level_name = $data['level_name'];
      $level->level_class_room = $data['level_class_room'];
      $level->tec_id_level_addvisor = $data['tec_id_level_addvisor'];
      $level->level_added_date = $data['level_added_date'];
      $level->level_expire_date = $data['level_expire_date'];
      $level->save();

      return 1;



    }



  }

  //editlevelplaceholdervalue

  public function editlevelplaceholdervalue($level_id){


   return Level::where(['level_id'=>$level_id])->first();



  }

  //updatelevel

  public function updatelevel(Request $request,$level_id){

    $data = $request->all();


   Level::where(['level_id'=>$level_id])->update(['dpt_myid'=>$data['dpt_myid'],'level_dpt_tution_free'=>$data['level_dpt_tution_free'],'level_name'=>$data['level_name'],'tec_id_level_addvisor'=>$data['tec_id_level_addvisor'],'level_added_date'=>$data['level_added_date'],'level_expire_date'=>$data['level_expire_date'],'level_class_room'=>$data['level_class_room']]);

   return 1;


  }


  public function delatelevel($level_id){

  Level::where(['level_id'=>$level_id])->delete();

   return 1;


  }

  //showallclassroominaddlevel

public function showallclassroominaddlevel(){

  return Classroom::get();

}




}

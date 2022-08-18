<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use App\Classroom;
use App\Batch;

use DB;
use DateTime;
Use Image;

class BatchController extends Controller
{



public function showalldepartmentinaddbatch(){


    return Department::get();


}

//showallbatch

public function showallbatch(){

$showallbatch = DB::table('batches')

            ->join('departments','batches.mydept_id','=','departments.department_id')



             ->get();

             return response()->json([

             'showallbatch'=>$showallbatch

            ],200);


}

//addbatchformaction

public function addbatchformaction(Request $request){

  $data = $request->all();

  $check = Batch::where(['batch_name'=>$data['batch_name'],'mydept_id'=>$data['mydept_id']])->first();

  if($check){

    return 0;


  }else{

    $data = $request->all();
     $todaydate = date("d-m-Y");

    $batch = new Batch;
    $batch->batch_name = $data['batch_name'];
    $batch->mydept_id = $data['mydept_id'];
    $batch->batch_added_date = $todaydate;
    $batch->save();

    return 1;


  }

}

//activebatchunactive


public function activebatchunactive($batch_id){

Batch::where(['batch_id'=>$batch_id])->update(['batch_added_status'=>0]);

return 0;

}


public function unactivebatchactive($batch_id){

  Batch::where(['batch_id'=>$batch_id])->update(['batch_added_status'=>1]);

  return 1;


}

//editbatchplaceholdervalue


public function editbatchplaceholdervalue($batch_id){

return Batch::where(['batch_id'=>$batch_id])->first();

}

//updatebatch

public function updatebatch(Request $request,$batch_id){

  $data = $request->all();

Batch::where(['batch_id'=>$batch_id])->update(['batch_name'=>$data['batch_name'],'mydept_id'=>$data['mydept_id'],'batch_added_date'=>$data['batch_added_date']]);

return 1;


}





}

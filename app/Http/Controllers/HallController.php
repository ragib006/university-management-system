<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use App\Department;
use App\Addteacher;
use App\Level;
use App\Classroom;
use App\Addhall;
use App\Addhallroom;
use App\Transport;



use DB;
use DateTime;
Use Image;

class HallController extends Controller
{

//showallhall

public function showallhall(){

return Addhall::get();


}

//addhallformaction

public function addhallformaction(Request $request){

 $todaydate = date("d-m-Y");
    $data = $request->all();

    $hall = new Addhall;

    $hall->hall_name = $data['hall_name'];
    $hall->hall_type = $data['hall_type'];
    $hall->hall_added_date = $todaydate;

    $hall->save();

    return 0;

}


//activehallunactive


public function activehallunactive($hall_id){


       Addhall::where(['hall_id'=>$hall_id])->update(['hall_status'=>0]);
       return 0;



}

//unactivehallactive


public function unactivehallactive($hall_id){


       Addhall::where(['hall_id'=>$hall_id])->update(['hall_status'=>1]);
       return 0;



}



//edithallplaceholdervalue
//myedithallplaceholdervalue

public function myedithallplaceholdervalue($hall_id){

   return Addhall::where(['hall_id'=>$hall_id])->first();

}


//delatemyhall

public function delatemyhall($hall_id){

Addhall::where(['hall_id'=>$hall_id])->delete();

return 1;


}


//updatehall

public function updatehall(Request $request,$hall_id){

  $data = $request->all();


Addhall::where(['hall_id'=>$hall_id])->update(['hall_name'=>$data['hall_name'],'hall_type'=>$data['hall_type'],'hall_added_date'=>$data['hall_added_date']]);

return 1;


}



public function showhallinselectform(){


  return AddHall::get();


}

//addhallroomformaction


public function addhallroomformaction(Request $request){


      $todaydate = date("d-m-Y");
       $data = $request->all();

  $check = Addhallroom::where(['myhall_id'=>$data['myhall_id'],'hall_room_name'=>$data['hall_room_name']])->first();


  if($check){

    return 0;


  }else{

    $hall = new Addhallroom;

    $hall->myhall_id = $data['myhall_id'];
    $hall->hall_room_name = $data['hall_room_name'];
    $hall->hall_room_number = $data['hall_room_number'];
    $hall->hall_room_floor = $data['hall_room_floor'];
    $hall->hall_room_sit_number = $data['hall_room_sit_number'];
    $hall->hall_room_sit_fee = $data['hall_room_sit_fee'];
    $hall->hall_room_added_date = $todaydate;

    $hall->save();

    return 1;

  }



}

//showmyallhallroom

public function showmyallhallroom(){


  $showallhallroom = DB::table('addhallrooms')

               ->join('addhalls','addhallrooms.myhall_id','=','addhalls.hall_id')
               ->get();

            //   return $showallhallroom;

               return response()->json([

               'showallhallroom'=>$showallhallroom

              ],200);



}

//myactivehallroomunactive
public function myactivehallroomunactive($hall_room_id){

Addhallroom::where(['hall_room_id'=>$hall_room_id])->update(['hall_room_status'=>0]);

return 0;


}


public function myunactivehallroomactive($hall_room_id){

Addhallroom::where(['hall_room_id'=>$hall_room_id])->update(['hall_room_status'=>1]);

return 1;


}

//delatehallroom


public function delatehallroom($hall_room_id){

Addhallroom::where(['hall_room_id'=>$hall_room_id])->delete();

return 1;

}

//edithallroomplaceholdervalue


public function edithallroomplaceholdervalue($hall_room_id){

  return Addhallroom::where(['hall_room_id'=>$hall_room_id])->first();


}

//updatehallroom


public function updatehallroom(Request $request,$hall_room_id){


  $data = $request->all();


Addhallroom::where(['hall_room_id'=>$hall_room_id])->update(['myhall_id'=>$data['myhall_id'],'hall_room_name'=>$data['hall_room_name'],'hall_room_number'=>$data['hall_room_number'],'hall_room_floor'=>$data['hall_room_floor'],'hall_room_sit_number'=>$data['hall_room_sit_number'],'hall_room_sit_fee'=>$data['hall_room_sit_fee'],'hall_room_added_date'=>$data['hall_room_added_date']]);

return 1;



}

//showallbus


public function showallbus(){


return Transport::get();


}

//myactivebusunactive


public function myactivebusunactive($bus_id){


    Transport::where(['bus_id'=>$bus_id])->update(['bus_status'=>0]);
     return 0;


}

public function myunactivebusactive($bus_id){


     Transport::where(['bus_id'=>$bus_id])->update(['bus_status'=>1]);
     return 1;


}

//editbusplaceholdervalue


public function editbusplaceholdervalue($bus_id){

  return Transport::where(['bus_id'=>$bus_id])->first();

}

//updatebus

public function updatebus(Request $request,$bus_id){


  $data = $request->all();


Transport::where(['bus_id'=>$bus_id])->update(['bus_number'=>$data['bus_number'],'bus_name'=>$data['bus_name'],'bus_sit_number'=>$data['bus_sit_number'],'bus_fee'=>$data['bus_fee'],'bus_route'=>$data['bus_route'],'bus_added_date'=>$data['bus_added_date']]);

 return 1;


}


//addbusformaction

public function addbusformaction(Request $request){

  $data = $request->all();
      $todaydate = date("d-m-Y");

  $check = Transport::where(['bus_number'=>$data['bus_number']])->first();

  if($check){

      return 0;


  }else{


    $bus = new Transport;
    $bus->bus_number = $data['bus_number'];
    $bus->bus_name = $data['bus_name'];
    $bus->bus_sit_number = $data['bus_sit_number'];
    $bus->bus_fee = $data['bus_fee'];
    $bus->bus_route = $data['bus_route'];
    $bus->bus_added_date = $todaydate;
    $bus->save();

    return 1;



  }



}



}

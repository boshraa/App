<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Expert;
use App\Duration;
use App\Slot;
use DateTime;
class AppController extends Controller
{

	//For fetching slots for each duration
public function slot( )
{   
  // Save::whereNotNull('id')->delete();
    
    $start = '9:00AM';  // expert start time
    $end = '7:00PM';  // End time
    $duration = 40;  // split by 30 mins

  
     $start = new DateTime($start);
        $end = new DateTime($end);
        $start_time = $start->format('H:i');
        $end_time = $end->format('H:i');
        $i=0;
        while(strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $i++;
            if(strtotime($start_time) <= strtotime($end_time)){
                $time[$i]['start'] = $start;
                $time[$i]['end'] = $end;
            }
        }
        return $time;
      
       //$slots = Save::get()->pluck("period","id");
   // $slots = Slot::where("duration_id",$id)->pluck("slot","id");
       $myObj = json_encode($time);
   
dd($myObj);

    
}
}

<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Slot;
use App\Expert;
use App\Save;
use App\Duration;
use App\Appointment;
use Session;
use Auth;


class Controller extends BaseController
{   
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
     public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
      $experts=Expert::get();
       return view('index' , compact('experts'));
    }

     public function book($id)
    {  
      $expert=Expert::find($id);
      Session()->put('expert', $id);
      $durations=Duration::get();
       return view('book' , compact('expert','durations','expert'));
    }


//For fetching slots for each duration
public function getSlots($id )
{   
  // Save::whereNotNull('id')->delete();
    $expert_id = Session()->get('expert');
    $expert=Expert::find($expert_id);
    $starttime = $expert->start_time;  // expert start time
    $endtime = $expert->end_time;  // End time
    $duration = Duration::find($id)->duration;  // split by 30 mins

    $array_of_time = array ();
    $start_time    = strtotime ($starttime); //change to strtotime
    $end_time      = strtotime ($endtime); //change to strtotime

    $add_mins  = $duration * 60;

    while ($start_time <= $end_time) // loop between time
    {
       $array_of_time[] = date ("H:i", $start_time);
       $start_time += $add_mins; // to check endtie=me
    }

    $new_array_of_time = array ();
    for($i = 0; $i < count($array_of_time) - 1; $i++)
    {
        $new_array_of_time[] = '' . $array_of_time[$i] . ' - ' . $array_of_time[$i + 1];
    }
        

      
       //$slots = Save::get()->pluck("period","id");
   // $slots = Slot::where("duration_id",$id)->pluck("slot","id");
    return response()->json($new_array_of_time);
}


 public function store(Request $request )
   { 
$this->validate($request, [

    'day'=>'required' ,
    'duration' => 'required',
]);

     $user=auth::user();
     $exist = \App\Appointment::where("time", "=", $request->duration)->where("day", "=", $request->day)->where("expert_id" , "=", Session()->get('expert') )->where('user_id' ,'<>',$user)->first();
  
    if($exist != null) {
       return back()->with('message', 'Y ');
     }
       else
       {
        $appointment = new Appointment;
        $appointment->user_id= auth::id();
        $appointment->expert_id=Session()->get('expert');
        $appointment->day=$request->day;
        $appointment->time=$request->slot;
        $appointment->status='blocked';

        $appointment->save();

        return back()->with('appointment' ,$appointment ); 

      }

      return back()->with('message' ,'the time slot is blocked' ); 
     

}

}
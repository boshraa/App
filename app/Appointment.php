<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expert ;
use App\User ;
class Appointment extends Model
{

	public function expert()
    {
   return $this->belongsTo(Expert::class);

   }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

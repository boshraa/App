<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Appointment ;
class Expert extends Model
{ 

   public function appointment()
    {
     return $this->hasMany(Appointment::class);
   }
}

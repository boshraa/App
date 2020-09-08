<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Douration ;
class Slot extends Model
{

	 public function douration()
    {
    return $this->belongsTo(Douration::class);
    } 
}

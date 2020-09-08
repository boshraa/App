<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slot;
class Duration extends Model
{
	public function slot()
    {
     return $this->hasMany(Slot::class);
   }
}

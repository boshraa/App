<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\Product;
use App\User;
class CategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
       $phone = User::find(1)->appointment->id;
       dd($phone);
       return view('index');
    }

}

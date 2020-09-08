<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\Product;
class CategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = Product::selection()->get();
        return response()->json($categories);

        return $this -> returnData('categories',$categories);
    }
}

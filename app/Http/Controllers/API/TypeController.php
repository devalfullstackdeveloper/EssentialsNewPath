<?php

 namespace App\Http\Controllers\Api;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class TypeController extends Controller
{

  public function index()
  {
    
  }
   public function search(Request $request, $search = "") {

    
    //return response()->json(Type::search($search));
    return response()->json(Type::search($request->all()));

    // if ($request->wantsJson()) {
     

    //   return response()->json(Type::search($search));
    // } else {
    //   abort(403);
    // }
  }
}

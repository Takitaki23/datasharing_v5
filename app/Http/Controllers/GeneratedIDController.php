<?php

namespace App\Http\Controllers;

use App\Models\GeneratedID;
use Illuminate\Http\Request;

class GeneratedIDController extends Controller
{
    public function getGeneratedStID(Request $request){
        // dd($request);
        $alreadySaveID = GeneratedID::where('st_no',$request['st_id_no'])->first();
       if($alreadySaveID){
        return response()->json($alreadySaveID);
       }
       
    }
}

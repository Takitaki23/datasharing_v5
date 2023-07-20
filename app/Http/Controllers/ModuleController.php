<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\ModuleClass\Module;

class ModuleController extends Controller
{
    public function generateID(Request $request){
        // dd($request['params']);
        // return json_encode("success");
        $moduleResponse = Module::generateBulkID($request);
        return response()->json(['success' => 'success', 'path' => $moduleResponse, 'id'=>$request['params']['id']], Response::HTTP_OK);
    }

    public function previewID(Request $request){
        // dd($request);
        $moduleResponse = Module::collegeStudent($request);
        // return response()->json(['success' => 'success', 'path' => $moduleResponse, 'id'=>$request['params']['pid']], Response::HTTP_OK);
        return response()->json(['success' => 'success', 'path' => $moduleResponse, 'id'=>$request], Response::HTTP_OK);
    }
}

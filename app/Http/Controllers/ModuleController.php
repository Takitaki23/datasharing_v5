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
        $datas = [];
        $data = [
            "canvas" => [
                "width" => $request->get('canvas')['width'],
                "height" => $request->get('canvas')['height'],
            ],
            "profile" => [
                "profile" => $request->get('profile')['profile'],
                "x" => $request->get('profile')['x'],
                "y" => $request->get('profile')['y'],
                "width" => $request->get('profile')['width'],
                "height" => $request->get('profile')['height'],
            ],
            "signature" => [
                "signature" => $request->get('signature')['signature'],
                "x" => $request->get('signature')['x'],
                "y" => $request->get('signature')['y'],
                "width" => $request->get('signature')['width'],
                "height" => $request->get('signature')['height'],
            ],
            "textContents" => [
                [
                    "id" => $request->get('textContents')[0]['id'],
                    "content" => $request->get('textContents')[0]['content'],
                    "x" => $request->get('textContents')[0]['x'],
                    "y" => $request->get('textContents')[0]['y'],
                    "fontSize" => $request->get('textContents')[0]['fontSize'],
                    "fontFamily" => $request->get('textContents')[0]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContents')[1]['id'],
                    "content" => $request->get('textContents')[1]['content'],
                    "x" => $request->get('textContents')[1]['x'],
                    "y" => $request->get('textContents')[1]['y'],
                    "fontSize" => $request->get('textContents')[1]['fontSize'],
                    "fontFamily" => $request->get('textContents')[1]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContents')[2]['id'],
                    "content" => $request->get('textContents')[2]['content'],
                    "x" => $request->get('textContents')[2]['x'],
                    "y" => $request->get('textContents')[2]['y'],
                    "fontSize" => $request->get('textContents')[2]['fontSize'],
                    "fontFamily" => $request->get('textContents')[2]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContents')[3]['id'],
                    "content" => $request->get('textContents')[3]['content'],
                    "x" => $request->get('textContents')[3]['x'],
                    "y" => $request->get('textContents')[3]['y'],
                    "fontSize" => $request->get('textContents')[3]['fontSize'],
                    "fontFamily" => $request->get('textContents')[3]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContents')[4]['id'],
                    "content" => $request->get('textContents')[4]['content'],
                    "x" => $request->get('textContents')[4]['x'],
                    "y" => $request->get('textContents')[4]['y'],
                    "fontSize" => $request->get('textContents')[4]['fontSize'],
                    "fontFamily" => $request->get('textContents')[4]['fontFamily'],
                ],
            ],
            "textContentsBack" => [
                [
                    "id" => $request->get('textContentsBack')[0]['id'],
                    "content" => $request->get('textContentsBack')[0]['content'],
                    "x" => $request->get('textContentsBack')[0]['x'],
                    "y" => $request->get('textContentsBack')[0]['y'],
                    "fontSize" => $request->get('textContentsBack')[0]['fontSize'],
                    "fontFamily" => $request->get('textContentsBack')[0]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContentsBack')[1]['id'],
                    "content" => $request->get('textContentsBack')[1]['content'],
                    "x" => $request->get('textContentsBack')[1]['x'],
                    "y" => $request->get('textContentsBack')[1]['y'],
                    "fontSize" => $request->get('textContentsBack')[1]['fontSize'],
                    "fontFamily" => $request->get('textContentsBack')[1]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContentsBack')[2]['id'],
                    "content" => $request->get('textContentsBack')[2]['content'],
                    "x" => $request->get('textContentsBack')[2]['x'],
                    "y" => $request->get('textContentsBack')[2]['y'],
                    "fontSize" => $request->get('textContentsBack')[2]['fontSize'],
                    "fontFamily" => $request->get('textContentsBack')[2]['fontFamily'],
                ],
                [
                    "id" => $request->get('textContentsBack')[3]['id'],
                    "content" => $request->get('textContentsBack')[3]['content'],
                    "x" => $request->get('textContentsBack')[3]['x'],
                    "y" => $request->get('textContentsBack')[3]['y'],
                    "fontSize" => $request->get('textContentsBack')[3]['fontSize'],
                    "fontFamily" => $request->get('textContentsBack')[3]['fontFamily'],
                ],
            ],
            "templates" => [
                "template" => $request->get('templates')['template'],
                "templateBack" => $request->get('templates')['templateBack'],
            ],
        ];
        $datas[] = $data;
        // dd($datas);
        $moduleResponse = Module::collegeStudent($datas);
        // return response()->json(['success' => 'success', 'path' => $moduleResponse, 'id'=>$request['params']['pid']], Response::HTTP_OK);
        return response()->json(['success' => 'success', 'path' => $moduleResponse, 'id'=>$request], Response::HTTP_OK);
    }
}

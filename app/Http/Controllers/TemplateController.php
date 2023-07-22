<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TemplateController extends Controller
{
    // get all the templates
    public function getImageTemplates()
    {
        // path to public
        $path = public_path('id_template/');
       
        // get all images in path
        $imageFiles = File::files($path);
        // dd($imageFiles);
        $imageNames = [];
        foreach ($imageFiles as $imageFile) {
            $imageName = basename($imageFile);
            // Check if the image name contains "f" before the file extension
            if (strpos($imageName, 'f.') !== false) {
                $imageNames[] = $imageName;
            }
        }
        return response()->json($imageNames);
    }

    // save template
    public function saveImageTemplates(Request $request){
        $alreadySaveT = Template::where('template_name',preg_replace('#/id_template#', 'id_template', $request->templates['template']))->first();
        // dd($request);
        if($alreadySaveT){

            $alreadySaveT->template_name = preg_replace('#/id_template#', 'id_template', $request->templates['template']);
            $alreadySaveT->template_back = preg_replace('#/id_template#', 'id_template', $request->templates['templateBack']);
            // canvas
            $alreadySaveT->canvas_width = $request->canvas['width'];
            $alreadySaveT->canvas_height = $request->canvas['height'];
            // profile
            $alreadySaveT->profile_w = $request->profile['width'];
            $alreadySaveT->profile_h = $request->profile['height'];
            $alreadySaveT->profile_x = $request->profile['x'];
            $alreadySaveT->profile_y = $request->profile['y'];
            // contents st_no
            $alreadySaveT->textContents_0_x = $request->textContents[0]['x'];
            $alreadySaveT->textContents_0_y = $request->textContents[0]['y'];
            $alreadySaveT->textContents_0_fs = $request->textContents[0]['fontSize'];
            $alreadySaveT->textContents_0_ff = $request->textContents[0]['fontFamily'];
            // contents course
            $alreadySaveT->textContents_1_x = $request->textContents[1]['x'];
            $alreadySaveT->textContents_1_y = $request->textContents[1]['y'];
            $alreadySaveT->textContents_1_fs = $request->textContents[1]['fontSize'];
            $alreadySaveT->textContents_1_ff = $request->textContents[1]['fontFamily'];
            // contents lastname
            $alreadySaveT->textContents_2_x = $request->textContents[2]['x'];
            $alreadySaveT->textContents_2_y = $request->textContents[2]['y'];
            $alreadySaveT->textContents_2_fs = $request->textContents[2]['fontSize'];
            $alreadySaveT->textContents_2_ff = $request->textContents[2]['fontFamily'];
            // contents fisrtname
            $alreadySaveT->textContents_3_x = $request->textContents[3]['x'];
            $alreadySaveT->textContents_3_y = $request->textContents[3]['y'];
            $alreadySaveT->textContents_3_fs = $request->textContents[3]['fontSize'];
            $alreadySaveT->textContents_3_ff = $request->textContents[3]['fontFamily'];
            // contents middlename
            $alreadySaveT->textContents_4_x = $request->textContents[4]['x'];
            $alreadySaveT->textContents_4_y = $request->textContents[4]['y'];
            $alreadySaveT->textContents_4_fs = $request->textContents[4]['fontSize'];
            $alreadySaveT->textContents_4_ff = $request->textContents[4]['fontFamily'];

            // back coordinates
            // signature
            $alreadySaveT->signature_w = $request->signature['width'];
            $alreadySaveT->signature_h = $request->signature['height'];
            $alreadySaveT->signature_x = $request->signature['x'];
            $alreadySaveT->signature_y = $request->signature['y'];
            // contents contact person
            $alreadySaveT->textContentsBack_0_x = $request->textContentsBack[0]['x'];
            $alreadySaveT->textContentsBack_0_y = $request->textContentsBack[0]['y'];
            $alreadySaveT->textContentsBack_0_fs = $request->textContentsBack[0]['fontSize'];
            $alreadySaveT->textContentsBack_0_ff = $request->textContentsBack[0]['fontFamily'];
            // contents address 1
            $alreadySaveT->textContentsBack_1_x = $request->textContentsBack[1]['x'];
            $alreadySaveT->textContentsBack_1_y = $request->textContentsBack[1]['y'];
            $alreadySaveT->textContentsBack_1_fs = $request->textContentsBack[1]['fontSize'];
            $alreadySaveT->textContentsBack_1_ff = $request->textContentsBack[1]['fontFamily'];
            // contents contact
            $alreadySaveT->textContentsBack_2_x = $request->textContentsBack[2]['x'];
            $alreadySaveT->textContentsBack_2_y = $request->textContentsBack[2]['y'];
            $alreadySaveT->textContentsBack_2_fs = $request->textContentsBack[2]['fontSize'];
            $alreadySaveT->textContentsBack_2_ff = $request->textContentsBack[2]['fontFamily'];
            // contents semester
            $alreadySaveT->textContentsBack_3_x = $request->textContentsBack[3]['x'];
            $alreadySaveT->textContentsBack_3_y = $request->textContentsBack[3]['y'];
            $alreadySaveT->textContentsBack_3_fs = $request->textContentsBack[3]['fontSize'];
            $alreadySaveT->textContentsBack_3_ff = $request->textContentsBack[3]['fontFamily'];
            // font used
            $alreadySaveT->primary_font = 'id_fonts\Helvetica.ttf';
            $alreadySaveT->secondary_font = 'id_fonts\Helvetica-Bold.ttf';
            // color used
            $alreadySaveT->rgb_color_primary = '0,0,0';
            $alreadySaveT->rgb_color_secondary = '0,100,0';
            $alreadySaveT->rgb_color_tertiary = '50,50,50';
            // contents middlename
            // $alreadySaveT->textContentsBack_4_x = $request->textContentsBack[4]['x'];
            // $alreadySaveT->textContentsBack_4_y = $request->textContentsBack[4]['y'];
            $alreadySaveT->save();
            return response()->json(['message' => 'Template Updated successfully']);
        }else{
            $template = new Template();
            $template->template_name = preg_replace('#/id_template#', 'id_template', $request->templates['template']);
            $template->template_back = preg_replace('#/id_template#', 'id_template', $request->templates['templateBack']);
            // canvas
            $template->canvas_width = $request->canvas['width'];
            $template->canvas_height = $request->canvas['height'];
            // profile
            $template->profile_w = $request->profile['width'];
            $template->profile_h = $request->profile['height'];
            $template->profile_x = $request->profile['x'];
            $template->profile_y = $request->profile['y'];
            // contents st_no
            $template->textContents_0_x = $request->textContents[0]['x'];
            $template->textContents_0_y = $request->textContents[0]['y'];
            $template->textContents_0_fs = $request->textContents[0]['fontSize'];
            $template->textContents_0_ff = $request->textContents[0]['fontFamily'];
            // contents course
            $template->textContents_1_x = $request->textContents[1]['x'];
            $template->textContents_1_y = $request->textContents[1]['y'];
            $template->textContents_1_fs = $request->textContents[1]['fontSize'];
            $template->textContents_1_ff = $request->textContents[1]['fontFamily'];
            // contents lastname
            $template->textContents_2_x = $request->textContents[2]['x'];
            $template->textContents_2_y = $request->textContents[2]['y'];
            $template->textContents_2_fs = $request->textContents[2]['fontSize'];
            $template->textContents_2_ff = $request->textContents[2]['fontFamily'];
            // contents fisrtname
            $template->textContents_3_x = $request->textContents[3]['x'];
            $template->textContents_3_y = $request->textContents[3]['y'];
            $template->textContents_3_fs = $request->textContents[3]['fontSize'];
            $template->textContents_3_ff = $request->textContents[3]['fontFamily'];
            // contents middlename
            $template->textContents_4_x = $request->textContents[4]['x'];
            $template->textContents_4_y = $request->textContents[4]['y'];
            $template->textContents_4_fs = $request->textContents[4]['fontSize'];
            $template->textContents_4_ff = $request->textContents[4]['fontFamily'];

            // back coordinates
            // signature
            $template->signature_w = $request->signature['width'];
            $template->signature_h = $request->signature['height'];
            $template->signature_x = $request->signature['x'];
            $template->signature_y = $request->signature['y'];
            // contents contact person
            $template->textContentsBack_0_x = $request->textContentsBack[0]['x'];
            $template->textContentsBack_0_y = $request->textContentsBack[0]['y'];
            $template->textContentsBack_0_fs = $request->textContentsBack[0]['fontSize'];
            $template->textContentsBack_0_ff = $request->textContentsBack[0]['fontFamily'];
            // contents address 1
            $template->textContentsBack_1_x = $request->textContentsBack[1]['x'];
            $template->textContentsBack_1_y = $request->textContentsBack[1]['y'];
            $template->textContentsBack_1_fs = $request->textContentsBack[1]['fontSize'];
            $template->textContentsBack_1_ff = $request->textContentsBack[1]['fontFamily'];
            // contents contact
            $template->textContentsBack_2_x = $request->textContentsBack[2]['x'];
            $template->textContentsBack_2_y = $request->textContentsBack[2]['y'];
            $template->textContentsBack_2_fs = $request->textContentsBack[2]['fontSize'];
            $template->textContentsBack_2_ff = $request->textContentsBack[2]['fontFamily'];
            // contents semester
            $template->textContentsBack_3_x = $request->textContentsBack[3]['x'];
            $template->textContentsBack_3_y = $request->textContentsBack[3]['y'];
            $template->textContentsBack_3_fs = $request->textContentsBack[3]['fontSize'];
            $template->textContentsBack_3_ff = $request->textContentsBack[3]['fontFamily'];

            // font used
            $template->primary_font = 'id_fonts\Helvetica.ttf';
            $template->secondary_font = 'id_fonts\Helvetica-Bold.ttf';
            // color used
            $template->rgb_color_primary = '0,0,0';
            $template->rgb_color_secondary = '0,100,0';
            $template->rgb_color_tertiary = '50,50,50';
            $template->save();
            return response()->json(['message' => 'Template saved successfully']);
        }
    }

    // get the template coordinates
    public function getTemplateCoordinates(Request $request){
        // dd($request->get('activeTemplate'));
        // just for now
        // if get its a object then if its first array
        $tmpCoordinates = Template::where('template_name',$request->get('activeTemplate'))->get();
        return response()->json($tmpCoordinates);
    }
}

<?php 
    namespace App\Http\ModuleClass;

use App\Models\Template;
use App\Http\ModuleClass\Box;
use Illuminate\Http\Response;
use App\Http\ModuleClass\Color;
use App\Models\GeneratedID;
use Illuminate\Routing\Controller;

    require_once 'fpdf/transform.php';
    class Module extends Controller{
        public static function Province(){
            // return DB::select("refprovince")->fetch();
            return "Get province method here Module!";
        }
        public static function Town($provcode){
            // return DB::select("refcitymun")
            // ->where("provcode","=",$provcode)
            // ->fetch();
            return "Get town";
        }

        public static function Barangay($citymuncode){
            // return DB::select("refbrgy")
            // ->where("citymuncode","=",$citymuncode)
            // ->fetch();
            return "Get Barangay".Module::Town('dwadwa').public_path();
        }

        // flexFontSize
        public static function flexFontSize($text,$fs,$threshold){
        
            if($fs == 0){
                $fs = 11;
            }
            if($threshold == 0){
                $threshold = .4;
            }
            
            if(strlen($text) > 42){
                $fs = $fs - ($threshold * 15);
            }
            else if(strlen($text) > 40){
                $fs = $fs - ($threshold * 14);
            }
            else if(strlen($text) > 38){
                $fs = $fs - ($threshold * 13);
            }
            else if(strlen($text) > 36){
                $fs = $fs - ($threshold * 12);
            }
            else if(strlen($text) > 34){
                $fs = $fs - ($threshold * 11);
            }
            else if(strlen($text) > 32){
                $fs = $fs - ($threshold * 10);
            }
            else if(strlen($text) > 30){
                $fs = $fs - ($threshold * 9);
            }
            else if(strlen($text) > 28){
                $fs = $fs - ($threshold * 8);
            }
            else if(strlen($text) > 26){
                $fs = $fs - ($threshold * 7);
            }
            else if(strlen($text) > 24){
                $fs = $fs - ($threshold * 6);
            }
            else if(strlen($text) > 22){
                $fs = $fs - ($threshold * 5);
            }
            else if(strlen($text) > 20){
                $fs = $fs - ($threshold * 4);
            }
            else if(strlen($text) > 18){
                $fs = $fs - ($threshold * 3);
            }
            else if(strlen($text) > 16){
                $fs = $fs - ($threshold * 2);
            }
            else{
                $fs = $fs - ($threshold * 1);
            }
    
            return $fs;
        }

        // College id generate per student
        public static function collegeStudent($data){
            
            // $datas = json_decode($data);
            // dd($data->canvas['width']);
            // dd($data);
            // for debugging
            $lastname = $data->textContents[2]['content'];
            $firstname = $data->textContents[3]['content'];
            $middlename = $data->textContents[4]['content'];
            $suffix = '';
            $idnumber = $data->textContents[0]['content'];
            $program = $data->textContents[1]['content'];
            // $pid = $data['params']['pid'];
            // student no
            $pid = $data->textContents[0]['content'];
            // contact person
            $ecp = $data->textContentsBack[0]['content'];
            $street = "test test";
            $barangay = "test test";
            $town = "city";
            $province = "bataan";
            // guardian no
            $ecpc = $data->textContentsBack[2]['content'];
            $img = public_path($data->profile['profile']);
            $sig = public_path($data->signature['signature']);
            $type = "3";

            // template
            $im = imagecreatefrompng(public_path($data->templates['template']));
            $back = imagecreatefrompng(public_path($data->templates['templateBack']));
         
            $box = new Box($im);
            $box->setFontFace(public_path("id_fonts\Helvetica-Bold.ttf"));
    
            //name
            if($suffix == ""){
    
                $box->setFontColor(new Color(0,0,0));
                $box->setFontSize(Module::flexFontSize($lastname,45,2.5));
                $box->setBox($data->textContents[2]['x'],($data->textContents[2]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
                $box->setTextAlign('left','custom');
                $box->draw(strtoupper($lastname));
    
            }
            else{
    
                $lastname = $lastname.' ('.$suffix.')';
                $box->setFontColor(new Color(0,0,0));
                $box->setFontSize(Module::flexFontSize($lastname,45,2.5));
                $box->setBox($data->textContents[3]['x'],($data->textContents[3]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
                $box->setTextAlign('left','custom');
                $box->draw(strtoupper($lastname));
            }
    
            $box->setFontFace(public_path("id_fonts\Helvetica.ttf"));
            $box->setFontColor(new Color(0,0,0));
    
            $flex = (strlen($firstname) - 13);
    
            if($flex <= 0){
                $flex = 0;
            }
    
            if(strlen($firstname) > 15){
                $box->setFontSize(35-$flex);
            }
            else{
                $box->setFontSize(Module::flexFontSize($firstname,40,2.7));
            }
    
            // 40*2+15
            $box->setBox($data->textContents[3]['x'],($data->textContents[3]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
        //    center
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($firstname));
    
            $box->setFontColor(new Color(0,0,0));
            $box->setFontSize(Module::flexFontSize($middlename,40,2.7));
            $box->setBox($data->textContents[4]['x'],($data->textContents[4]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($middlename));
    
            $box->setFontFace(public_path("id_fonts\Helvetica-Bold.ttf"));
            $box->setFontColor(new Color(0,100,0));
            $box->setFontSize(Module::flexFontSize($idnumber,40,2.7));
            $box->setBox($data->textContents[0]['x'],($data->textContents[0]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($idnumber));
    
            $box->setFontFace(public_path("id_fonts\Helvetica-Bold.ttf"));
            $box->setFontColor(new Color(50,50,50));
            $box->setFontSize(Module::flexFontSize($program,35,1));
            $box->setBox($data->textContents[1]['x'],($data->textContents[1]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($program));
    
            $quality = 9; // 0 to 100
            imagesavealpha($im,true);
            imagealphablending($im,true);
            imagepng($im,public_path('id_final/').$pid.'_f.png', $quality);
            imagedestroy($im);
    
            $box = new Box($back);
            $box->setFontFace(public_path("id_fonts\Helvetica-Bold.ttf"));
    
            $box->setFontColor(new Color(0,0,0));
            $box->setFontSize(Module::flexFontSize($ecp,30,1));
            $box->setBox($data->textContentsBack[0]['x']*2,($data->textContentsBack[0]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($ecp));
    
            // original
            // $address1 = $street.', '.$barangay;
            $address1 = $data->textContentsBack[1]['content'];
            $address2 = $town.', '.$province;
    
            $box->setFontFace(public_path("id_fonts\Helvetica.ttf"));
    
            $box->setFontColor(new Color(0,0,0));
            $box->setFontSize(Module::flexFontSize($address1,25,0.4));
            $box->setBox($data->textContentsBack[1]['x']*2,($data->textContentsBack[1]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($address1));
    
            // $box->setFontColor(new Color(0,0,0));
            // $box->setFontSize(Module::flexFontSize($address2,25,0.3));
            // $box->setBox($data->textContentsBack[1]['x']*2,($data->textContentsBack[1]['y'] - 35),$data->canvas['width'],$data->canvas['height']);
            // $box->setTextAlign('left','custom');
            // $box->draw(strtoupper($address2));
    
            $box->setFontFace(public_path("id_fonts\Helvetica-Bold.ttf"));
    
            $box->setFontColor(new Color(0,0,0));
            $box->setFontSize(Module::flexFontSize($ecpc,25,0.3));
            $box->setBox($data->textContentsBack[2]['x']*2,($data->textContentsBack[2]['y'] - 40),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($ecpc));
    
            $box->setFontFace(public_path("id_fonts\Helvetica-Bold.ttf"));
    
            // $semAY = Module::getSemAY();
            // for debugging only
            $semAY = Module::getSemAY();
    
            $box->setFontColor(new Color(0,0,0));
            $box->setFontSize(Module::flexFontSize($semAY,30,0.3));
            $box->setBox(($data->textContentsBack[3]['x']*2) - 10,($data->textContentsBack[3]['y'] - 25),$data->canvas['width'],$data->canvas['height']);
            $box->setTextAlign('left','custom');
            $box->draw(strtoupper($semAY));
    
            $quality = 9; // 0 to 100
            imagesavealpha($back,true);
            imagealphablending($back,true);
            //imageflip($back, IMG_FLIP_HORIZONTAL);
            imagepng($back,public_path('id_final/').$pid.'_b.png', $quality);
            imagedestroy($back); 


            // save it to database
            $alreadySaveID = GeneratedID::where('st_no',$data->textContents[0]['content'])->first();
            // dd($data);
            if($alreadySaveID){
                $alreadySaveID->st_no = $data->textContents[0]['content'];
                $alreadySaveID->template_name = $data->templates['template'];
                // canvas
                $alreadySaveID->canvas_width = $data->canvas['width'];
                $alreadySaveID->canvas_height = $data->canvas['height'];
                // profile
                $alreadySaveID->profile = $data->profile['profile'];
                $alreadySaveID->profile_w = $data->profile['width'];
                $alreadySaveID->profile_h = $data->profile['height'];
                $alreadySaveID->profile_x = $data->profile['x'];
                $alreadySaveID->profile_y = $data->profile['y'];
                // contents st_no
                $alreadySaveID->textContents_0_x = $data->textContents[0]['x'];
                $alreadySaveID->textContents_0_y = $data->textContents[0]['y'];
                // contents course
                $alreadySaveID->textContents_1_x = $data->textContents[1]['x'];
                $alreadySaveID->textContents_1_y = $data->textContents[1]['y'];
                // contents lastname
                $alreadySaveID->textContents_2_x = $data->textContents[2]['x'];
                $alreadySaveID->textContents_2_y = $data->textContents[2]['y'];
                // contents fisrtname
                $alreadySaveID->textContents_3_x = $data->textContents[3]['x'];
                $alreadySaveID->textContents_3_y = $data->textContents[3]['y'];
                // contents middlename
                $alreadySaveID->textContents_4_x = $data->textContents[4]['x'];
                $alreadySaveID->textContents_4_y = $data->textContents[4]['y'];

                // back coordinates
                // signature
                $alreadySaveID->signature = $data->signature['signature'];
                $alreadySaveID->signature_x = $data->signature['x'];
                $alreadySaveID->signature_y = $data->signature['y'];
                // contents contact person
                $alreadySaveID->textContentsBack_0_x = $data->textContentsBack[0]['x'];
                $alreadySaveID->textContentsBack_0_y = $data->textContentsBack[0]['y'];
                // contents address 1
                $alreadySaveID->textContentsBack_1_x = $data->textContentsBack[1]['x'];
                $alreadySaveID->textContentsBack_1_y = $data->textContentsBack[1]['y'];
                // contents contact
                $alreadySaveID->textContentsBack_2_x = $data->textContentsBack[2]['x'];
                $alreadySaveID->textContentsBack_2_y = $data->textContentsBack[2]['y'];
                // contents semester
                $alreadySaveID->textContentsBack_3_x = $data->textContentsBack[3]['x'];
                $alreadySaveID->textContentsBack_3_y = $data->textContentsBack[3]['y'];
                $alreadySaveID->save();
                // return response()->json(['message' => 'Template Updated successfully']);
            }else{
                $template = new GeneratedID();
                $template->st_no = $data->textContents[0]['content'];
                $template->template_name = $data->templates['template'];
                // canvas
                $template->canvas_width = $data->canvas['width'];
                $template->canvas_height = $data->canvas['height'];
                // profile
                $template->profile = $data->profile['profile'];
                $template->profile_w = $data->profile['width'];
                $template->profile_h = $data->profile['height'];
                $template->profile_x = $data->profile['x'];
                $template->profile_y = $data->profile['y'];
                // contents st_no
                $template->textContents_0_x = $data->textContents[0]['x'];
                $template->textContents_0_y = $data->textContents[0]['y'];
                // contents course
                $template->textContents_1_x = $data->textContents[1]['x'];
                $template->textContents_1_y = $data->textContents[1]['y'];
                // contents lastname
                $template->textContents_2_x = $data->textContents[2]['x'];
                $template->textContents_2_y = $data->textContents[2]['y'];
                // contents fisrtname
                $template->textContents_3_x = $data->textContents[3]['x'];
                $template->textContents_3_y = $data->textContents[3]['y'];
                // contents middlename
                $template->textContents_4_x = $data->textContents[4]['x'];
                $template->textContents_4_y = $data->textContents[4]['y'];

                // font used
                $template->primary_font = 'id_fonts\Helvetica.ttf';
                $template->secondary_font = 'id_fonts\Helvetica-Bold.ttf';
                // color used
                $template->rgb_color_primary = '0,0,0';
                $template->rgb_color_secondary = '0,100,0';
                $template->rgb_color_tertiary = '50,50,50';

                // back coordinates
                // signature
                $template->signature = $data->signature['signature'];
                $template->signature_x = $data->signature['x'];
                $template->signature_y = $data->signature['y'];
                // contents contact person
                $template->textContentsBack_0_x = $data->textContentsBack[0]['x'];
                $template->textContentsBack_0_y = $data->textContentsBack[0]['y'];
                // contents address 1
                $template->textContentsBack_1_x = $data->textContentsBack[1]['x'];
                $template->textContentsBack_1_y = $data->textContentsBack[1]['y'];
                // contents contact
                $template->textContentsBack_2_x = $data->textContentsBack[2]['x'];
                $template->textContentsBack_2_y = $data->textContentsBack[2]['y'];
                // contents semester
                $template->textContentsBack_3_x = $data->textContentsBack[3]['x'];
                $template->textContentsBack_3_y = $data->textContentsBack[3]['y'];
                $template->save();
                // return response()->json(['message' => 'Template saved successfully']);
            }

            return Module::generatePreview($pid,$img,$sig,$data->signature['x'],$data->signature['y'],$type);
        }

        // preview for 1 student 
        public static function generatePreview($pid,$img,$sig,$sigX,$sigY,$type){

            $pdf = new \PDF('L','mm','A4');
    
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(false,0);
    
            switch ($type) {
    
                case '1':
    
                    $pdf->Image(public_path('id_final/').$pid.'_f.png',10,10,54.02,85.6);
                    $pdf->Image($img,27,35.9,37);
                    $pdf->Image(public_path('id_template/staffdaya.png'),10,10,54.02,85.6);
                    $pdf->RotatedImage(public_path('id_final/').$pid.'_b.png',64,195,54.02,85.6,180);
                    $pdf->RotatedImage($sig,52,153,25,0,180);
    
                    break;
    
                case '2':
    
                    $pdf->Image(public_path('id_final/').$pid.'_f.png',10,10,54.02,85.6);
                    $pdf->Image($img,27,35.9,37);
                    $pdf->Image(public_path('id_template/staffdaya.png'),10,10,54.02,85.6);
                    $pdf->RotatedImage(public_path('id_final/').$pid.'_b.png',64,195,54.02,85.6,180);
                    $pdf->RotatedImage($sig,52,153,25,0,180);
    
                    break;
    
                case '4':
    
                    $pdf->Image(public_path('id_final/').$pid.'_f.png',10,10,54.02,85.6);
                    $pdf->Image($img,27,35.9,37);
                    $pdf->Image(public_path('id_template/shssdaya.png'),10,10,54.02,85.6);
                    $pdf->RotatedImage(public_path('id_final/').$pid.'_b.png',64,195,54.02,85.6,180);
                    $pdf->RotatedImage($sig,52,153,25,0,180);
    
                    break;
                    // college student
                case '3':
                    
                    $pdf->RotatedImage($img,17,93,37,0,90);
                    $pdf->RotatedImage(public_path('id_final/').$pid.'_f.png',10,95,85.6,54.02,90);               
                    $pdf->RotatedImage(public_path('id_final/').$pid.'_b.png',10,195,85.6,54.02,90);
                    $pdf->RotatedImage($sig,$sigX,$sigY/2 ,25,0,90);
    
                    break;
    
                case '5':
    
                    $pdf->RotatedImage($img,17,93,37,0,90);
                    $pdf->RotatedImage('public/id_final/'.$pid.'_f.png',10,95,85.6,54.02,90);               
                    $pdf->RotatedImage('public/id_final/'.$pid.'_b.png',10,195,85.6,54.02,90);
                    $pdf->RotatedImage($sig,25,144,25,0,90);
    
                    break;
    
                case '7':
    
                    $pdf->RotatedImage($img,17,93,37,0,90);
                    $pdf->RotatedImage('public/id_final/'.$pid.'_f.png',10,95,85.6,54.02,90);               
                    $pdf->RotatedImage('public/id_final/'.$pid.'_b.png',10,195,85.6,54.02,90);
                    $pdf->RotatedImage($sig,24,144,25,0,90);
    
                    break;
                
                default:
    
                    $pdf->Image($img,23,25,30);
                    $pdf->Image(public_path('id_final/').$pid.'_f.png',10,10,54.02,85.6);     
                    $pdf->RotatedImage(public_path('id_final/').$pid.'_b.png',64,195,54.02,85.6,180);
                    $pdf->RotatedImage($sig,48,140,20,0,180);
    
                    break;
            }     
    
            $pdf->Output('F',public_path('id_pdfs/').$pid.'.pdf');
            return 'id_pdfs/'.$pid.'.pdf';
        }

        // generate bulk ID base on data
        public static function generateBulkID($data){
            // dd($data['params']);
            $toGenerate = array();
            $counter = 0;
    
            foreach ($data['params']['st_id'] as $key => $value) {
                // $value['student_id']);
                // for debugging
                // for ($i=1; $i <= $data['params']['id'] ; $i++) { 
                    # code...

                // get the student id coordinates using student_id
                $student_cred = GeneratedID::where('st_no', $value['student_id'])->first();
                // dd($student_cred);
                $counter++;
                //data declaration
                $type = "3";
                // this is the nmae of the id, the profile and the signature stored this on a database
                $pid = $value['student_id']; 
                $img = public_path("id_image/".$pid.".png");
                // since wala pang signature this is the default
                // $sig = public_path("id_signatures/1685325544.png");

                $sig = public_path("id_signatures/".$pid.".png");
    
                $toGenerate[$counter-1]["pid"] = $pid;
                $toGenerate[$counter-1]["type"] = $type;
                $toGenerate[$counter-1]["img"] = $img;
                $toGenerate[$counter-1]["width"] = $student_cred['profile_w'];
                $toGenerate[$counter-1]["sig"] = $sig;
                $toGenerate[$counter-1]["signatureX"] = $student_cred['signature_x'];
                $toGenerate[$counter-1]["signatureY"] = $student_cred['signature_y'];
                $toGenerate[$counter-1]["profileX"] = $student_cred['profile_x'];
                $toGenerate[$counter-1]["profileY"] = $student_cred['profile_y'];

            // }
            }
            return Module::generatePreviewBulk($toGenerate);
        }

        public static function generatePreviewBulk($data){
            // dd($data);
            $pdf = new \PDF('L','mm','A4');
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(false,0);
            $counter = 0;
            $space = 0;
            // $x2 = 0;
            $mt = 12.5;
            $mb = 23;
            foreach($data as $key => $value){
    
                $counter++;       
    
                if($counter > 1){
                    
                    if($counter > 4){
    
                        $pdf->AddPage();
                        $pdf->SetAutoPageBreak(false,0);
                        $counter = 1;
                        $space = 0;
                        $mt = 12.5; // Reset the accumulated top margin
                        $mb = 23; // Reset the accumulated bottom margin
    
                    }
                    // ito amg gagalawin
                    else{
                        // between template
                        $space += 64.02;
                        // x top position
                        $mt = (12.5 + $space);
                        $mb = ($space+23);
                        // $x2 = 10;
                        // dd($mt);
                    }
                }  
    
                // problem is when its on top its on bottom, alternate position
                switch ($value["type"]) {
                     // college done id location, $value["pid"] = name of the id
                     case '3':
                        // 
                        // 93 = max left and 50 max right y axis rotated
                        // 10+$pace = max top and max bottom 23+space x axis rotated
                        $canvasLeft = -3; // Maximum left position on the canvas X
                        $canvasRight = 659; // Maximum right position on the canvas X
                        $canvasTop = 1; // Maximum left position on the canvas Y
                        $canvasBottom = 225; // Maximum right position on the canvas Y


                        $y = 95 - (($value['profileX'] - $canvasLeft) * (95 - 50) / ($canvasRight - $canvasLeft)); // Map canvas Y to PDF Y ; // Calculate Y coordinate
                        $x = $mt - (($value['profileY'] - $canvasTop) * ($mb-$mt) / ( $canvasTop - $canvasBottom)); // Calculate X coordinate
                        // dd($x);

                        // Calculate the conversion factor
                        $pxValue = 352;
                        $ptValue = 33;
                        $conversionFactor = $ptValue / $pxValue;

                        // Convert a size in pixels to points
                        $sizeInPx = $value['width']; // Change this value to any other size in pixels
                        $w = $sizeInPx * $conversionFactor;

                        if($sizeInPx == 200){
                            $y += -2;
                            $x += 3;
                        }elseif($sizeInPx == 250){
                            // $y += -1;
                            $x += 2;
                        }elseif($sizeInPx == 300){
                            $y += +.2;
                            $x += .6;
                        }else{
                            $x += .6;
                        }

                        
                        // dd($w);
                        // $ys = 95 - (($value['signatureX'] - $canvasLeft) * (95 - 50) / ($canvasRight - $canvasLeft));
                        // $xs = 12.5+$space - (($value['signatureY'] - $canvasTop) * (12.5+$space - 23+$space) / ($canvasBottom - $canvasTop));
                        
                        $pdf->RotatedImage($value["img"],$x,$y,$w,0,90);
                        $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_f.png',10+$space,95,85.6,54.02,90);               
                        $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',10+$space,195,85.6,54.02,90);
                        $pdf->RotatedImage($value["sig"],22+$space,144,25,0,90);
    
                        break;
    
                    // case '1':
    
                    //     $pdf->Image(public_path('id_final/').$value["pid"].'_f.png',10+$space,10,54.02,85.6);
                    //     $pdf->Image($value["img"],27+$space,35.9,37);
                    //     $pdf->Image(public_path('id_template/staffdaya.png'),10+$space,10,54.02,85.6);
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',64+$space,195,54.02,85.6,180);
                    //     $pdf->RotatedImage($value["sig"],52+$space,153,25,0,180);
    
                    //     break;
    
                    // case '2':
    
                    //     $pdf->Image(public_path('id_final/').$value["pid"].'_f.png',10+$space,10,54.02,85.6);
                    //     $pdf->Image($value["img"],27+$space,35.9,37);
                    //     $pdf->Image(public_path('id_template/staffdaya.png'),10+$space,10,54.02,85.6);
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',64+$space,195,54.02,85.6,180);
                    //     $pdf->RotatedImage($value["sig"],52+$space,153,25,0,180);
    
                    //     break;
    
                    // case '4':
    
                    //     $pdf->Image(public_path('id_final/').$value["pid"].'_f.png',10+$space,10,54.02,85.6);
                    //     $pdf->Image($value["img"],27+$space,35.9,37);
                    //     $pdf->Image(public_path('id_template/shssdaya.png'),10+$space,10,54.02,85.6);
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',64+$space,195,54.02,85.6,180);
                    //     $pdf->RotatedImage($value["sig"],52+$space,153,25,0,180);
    
                    //     break;
    
                       
    
                    // case '5':
                    //     $pdf->RotatedImage($value["img"],17+$space,93,37,0,90);
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_f.png',10+$space,95,85.6,54.02,90);               
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',10+$space,195,85.6,54.02,90);
                    //     $pdf->RotatedImage($value["sig"],25+$space,144,25,0,90);
    
                    //     break;
    
                    // case '7':
    
                    //     $pdf->RotatedImage($value["img"],17+$space,93,37,0,90);
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_f.png',10+$space,95,85.6,54.02,90);               
                    //     $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',10+$space,195,85.6,54.02,90);
                    //     $pdf->RotatedImage($value["sig"],24+$space,144,25,0,90);
    
                    //     break;
                    
                    default:
    
                        $pdf->Image($value["img"],23+$space,25,30);
                        $pdf->Image(public_path('id_final/').$value["pid"].'_f.png',10+$space,10,54.02,85.6);     
                        $pdf->RotatedImage(public_path('id_final/').$value["pid"].'_b.png',64+$space,195,54.02,85.6,180);
                        $pdf->RotatedImage($value["sig"],48+$space,140,20,0,180);
    
                        break;
                }
            }
            $pdf->Output('F',public_path('id_pdfs/print2.pdf'));
            return 'id_pdfs/print2.pdf';
        }

        // semester AY
        public static function getSemAY(){
            return '1st Semester AY '.date('Y').' - '.date('Y',strtotime('+1 year'));     
        }
    }
?>
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedID extends Model
{
    protected $fillable = [
        'st_no',
        'template_name','canvas_width',
        'canvas_height','profile_x','profile_y',
        'signature_x','signature_y',
        'textContents_0_x','textContents_0_y',
        'textContents_1_x','textContents_1_y',
        'textContents_2_x','textContents_2_y',
        'textContents_3_x','textContents_3_y',
        'textContents_4_x','textContents_4_y',
        'textContentsBack_0_x','textContentsBack_0_y',
        'textContentsBack_1_x','textContentsBack_1_y',
        'textContentsBack_2_x','textContentsBack_2_y',
        'textContentsBack_3_x','textContentsBack_3_y',
        'primary_font','secondary_font',
        'rgb_color_primary','rgb_color_secondary','rgb_color_tertiary',
        
    ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'template_name','template_back',
        'canvas_width','canvas_height',
        'profile_x','profile_y','profile_w','profile_h','signature_x','signature_y',
        'textContents-0-x','textContents-0-y','textContents-0-fs','textContents-0-ff',
        'textContents-1-x','textContents-1-y','textContents-1-fs','textContents-1-ff',
        'textContents-2-x','textContents-2-y','textContents-2-fs','textContents-2-ff',
        'textContents-3-x','textContents-3-y','textContents-3-fs','textContents-3-ff',
        'textContents-4-x','textContents-4-y','textContents-4-fs','textContents-4-ff',
        'textContentsBack-0-x','textContentsBack-0-y','textContentsBack-0-fs','textContentsBack-0-ff',
        'textContentsBack-1-x','textContentsBack-1-y','textContentsBack-1-fs','textContentsBack-1-ff',
        'textContentsBack-2-x','textContentsBack-2-y','textContentsBack-2-fs','textContentsBack-2-ff',
        'textContentsBack-3-x','textContentsBack-3-y','textContentsBack-3-fs','textContentsBack-3-ff',
        
    ];
    use HasFactory;
}

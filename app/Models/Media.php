<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media_galleries';
    
    protected $fillable = [
        'link_media',
        'caption',
        'type'
    ];
}

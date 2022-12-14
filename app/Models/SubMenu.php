<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'parent_menu',
        'order',
        'slug',
        'url_images'
    ];
}

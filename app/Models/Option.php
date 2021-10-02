<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'logo',
        'favicon',
        'phone',
        'email',
        'address',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'profile_url',
        'profile_title',
        'profile_description'
    ];
}

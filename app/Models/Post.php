<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'featured_image',
        'title',
        'slug',
        'content',
        'is_published'
    ];

    public function userId()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('d F Y H:i:s');
    }
}

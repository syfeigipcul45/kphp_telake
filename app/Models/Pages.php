<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'sub_menus_id',
        'featured_image',
        'slug'
    ];

    public function userId()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function parentMenu()
    {
        return $this->belongsTo(SubMenu::class, 'sub_menu_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('d F Y H:i:s');
    }
}

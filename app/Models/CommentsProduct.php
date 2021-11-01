<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comment',
        'product_id',
        'is_published'
    ];

    public function productId()
    {
        return $this->belongsTo(Seed::class, 'product_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i:s');
    }
}

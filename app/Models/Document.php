<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'file_url',
        'is_published'
    ];

    public function documentCategory()
    {
        return $this->belongsTo(DocumentCategory::class, 'category_id');
    }
}

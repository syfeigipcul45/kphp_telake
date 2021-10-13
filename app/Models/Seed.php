<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    use HasFactory;

    protected $fillable = [
        'seed_thumbnail',
        'seed_name',
        'description',
        'seller_whatsapp',
        'seed_price',
        'seed_stock'
    ];
}

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
        'seller_name',
        'seed_price',
        'seed_stock',
        'seed_age',
        'seed_height'
    ];
}

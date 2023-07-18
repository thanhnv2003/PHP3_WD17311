<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product', 'image'
    ];
}

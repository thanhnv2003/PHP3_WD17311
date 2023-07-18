<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
      'id_cate', 'name', 'amount', 'old_price', 'sale_price', 'description', 'status'
    ];
}

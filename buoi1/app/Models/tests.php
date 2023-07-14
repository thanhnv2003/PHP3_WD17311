<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tests extends Model
{
    use HasFactory;

    //ánh xạ
    protected $table = 'tests'; //phải điền đúng tên bảng mà mình cần trỏ tới trong CSDL

    protected $fillable = [
        'name',
        'email',
        'address',
        'date_of_birth'
    ];

}

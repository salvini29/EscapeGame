<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_name' ,'code_1' ,'code_2', 'code_3', 'code_4' ,'code_5', 'code_6'
    ];
}

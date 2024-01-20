<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEvent extends Model
{
    use HasFactory;
    protected $table = 'member_event'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'idSt', // Tên cột trong bảng
        'idEvent',
        'status'
    ];
}

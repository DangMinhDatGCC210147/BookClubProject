<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = [
        'idSt', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'total',
    ];

    protected $casts = [
        'jan' => 'integer',
        'feb' => 'integer',
        'mar' => 'integer',
        'apr' => 'integer',
        'may' => 'integer',
        'jun' => 'integer',
        'jul' => 'integer',
        'aug' => 'integer',
        'sep' => 'integer',
        'oct' => 'integer',
        'nov' => 'integer',
        'dec' => 'integer',
        'total' => 'integer',
    ];

    // Mô hình quan hệ với bảng Members
    public function member()
    {
        return $this->belongsTo(Member::class, 'idSt', 'idSt');
    }
}

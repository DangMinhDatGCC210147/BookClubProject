<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSt',
        'idEvent',
        'attendance_date',
    ];

    protected $casts = [
        'idSt' => 'string',
        'idEvent' => 'integer',
        'attendance_date' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'idSt', 'idSt');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'idEvent');
    }
}

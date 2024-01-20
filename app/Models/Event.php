<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nameEvent',
        'time_start',
        'time_end',
        'date',
        'score',
        'venue',
        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'comments',
        'status',
    ];

    protected $casts = [
        'image' => 'string',
        'nameEvent' => 'string',
        'date' => 'date',
        'score' => 'integer',
        'venue' => 'string',
        'description_1' => 'string',
        'description_2' => 'string',
        'description_3' => 'string',
        'description_4' => 'string',
        'comments' => 'string',
        'status' => 'integer'
    ];

    public function setTimeAttribute($value)
    {
        // Chuyển đổi giá trị thời gian thành đối tượng Carbon
        $this->attributes['time_start'] = Carbon::parse($value)->format('H:i');
        $this->attributes['time_end'] = Carbon::parse($value)->format('H:i');
    }

    public function getTimeAttribute($value)
    {
        // Lấy giá trị thời gian dưới dạng đối tượng Carbon
        return Carbon::parse($value)->format('H:i');
    }
    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_event', 'idEvent', 'idSt');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'idSt',
        'image',
        'name',
        'gender',
        'dateOfBirth',
        'course',
        'email',
        'phoneNumber',
        'joiningDate'
    ];

    protected $casts = [
        'idSt' => 'string',
        'image' => 'string',
        'name' => 'string',
        'gender' => 'int',
        'dateOfBirth' => 'date',
        'course' => 'string',
        'email' => 'string',
        'phoneNumber' => 'string',
        'joiningDate' => 'date',
    ];
    public function memberEvents()
    {
        return $this->belongsToMany(Event::class, 'member_event', 'idSt', 'idEvent');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'idSt', 'idSt');
    }
}

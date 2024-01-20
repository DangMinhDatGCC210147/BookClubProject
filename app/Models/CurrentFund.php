<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentFund extends Model
{
    use HasFactory;
    protected $fillable = ['money'];

    protected $casts = [
        'money' => 'decimal:2',
    ];
}

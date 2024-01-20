<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalFunds extends Model
{
    use HasFactory;

    protected $table = 'total_funds';

    protected $fillable = ['month', 'year', 'total_amount'];

    protected $casts = [
        'month' => 'string',
        'year' => 'string',
        'total_amount' => 'decimal:2', // Chuyển đổi sang kiểu decimal với 2 chữ số thập phân
    ];
    
    public function funds()
    {
        return $this->hasMany(Fund::class, 'total_funds_id');
    }

}

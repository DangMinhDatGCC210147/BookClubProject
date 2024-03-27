<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nameSt', 'idSt', 'image', 'email', 'link', 'description_1', 'description_2', 'submission_date'];

    public function member()
    {
        return $this->hasOne(Member::class, 'idSt', 'idSt');
    }

    // public function votes()
    // {
    //     return $this->hasMany(Vote::class);
    // }

    // public function votesCount()
    // {
    //     return $this->votes()->count();
    // }
}

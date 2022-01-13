<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'level',
        'singer',
        'key',
        'body',
        'user_id',
    ];

    public function scores(){
        return $this->hasMany(Scores::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

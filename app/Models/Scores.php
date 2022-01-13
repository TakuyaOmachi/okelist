<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}

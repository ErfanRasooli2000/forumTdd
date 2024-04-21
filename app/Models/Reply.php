<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'thread_id',
        'user_id',
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
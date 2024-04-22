<?php

namespace App\Models;

use Database\Factories\ReplyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'body',
        'thread_id',
        'user_id',
    ];

    public static function newFactory()
    {
        return ReplyFactory::new();
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}

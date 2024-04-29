<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "body",
        "user_id",
        "chanel_id",
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function path()
    {
        return "threads/{$this->chanel->name}/{$this->id}";
    }

    public function addReply($values)
    {
        return Reply::create($values);
    }

    public function creator()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function chanel()
    {
        return $this->belongsTo(Chanel::class);
    }
}

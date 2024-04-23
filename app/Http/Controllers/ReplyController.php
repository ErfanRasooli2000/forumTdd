<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyStoreRequest;
use App\Models\Thread;

class ReplyController extends Controller
{
    public function store(Thread $thread , ReplyStoreRequest $request)
    {
        $data = $request->validated();
        $data["thread_id"] = $thread->id;
        $data["user_id"] = \Auth::id();

        $thread->addReply($data);

        return redirect()->route('thread.show' , ['thread' => $thread]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadCreateRequest;
use App\Models\Chanel;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::all();
        return view('threads/index' , compact('threads'));
    }
    public function show(Chanel $chanel,Thread $thread)
    {
        return view('threads/show', compact('thread'));
    }

    public function create(ThreadCreateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = \Auth::id();

        Thread::create($data);

        return redirect()->route('thread.all');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Thread;

class ReplyController extends Controller
{
    public function store(Thread $thread, Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $thread->replies()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('threads.show', $thread);
    }
}

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

        $reply = $thread->replies()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        // Set indikator has_new_reply
        $thread->update(['has_new_reply' => true]);

        return redirect()->route('threads.show', $thread);
    }
}

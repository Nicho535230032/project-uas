<?php

namespace App\Http\Controllers;
use App\Models\Thread;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::latest()->get();
        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Thread::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('threads.index');
    }

    public function show(Thread $thread)
    {
        // Reset indikator has_new_reply
        if (auth()->id() == $thread->user_id) {
            $thread->update(['has_new_reply' => false]);
        }

        return view('threads.show', compact('thread'));
    }
}

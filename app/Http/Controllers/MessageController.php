<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('messages');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return response()->json(['message' => 'Message sent successfully!', 'data' => $message], 200);
    }

    public function getMessages()
    {
        $messages = Message::where('receiver_id', auth()->id())->get();

        return response()->json(['data' => $messages], 200);
    }
}

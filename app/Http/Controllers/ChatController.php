<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    //
    public function saveChat(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'message' => 'required|string',
            'response' => 'required|string',
        ]);

        // Save the chat data to the database
        $chat = Chat::create([
            'message' => $request->input('message'),
            'response' => $request->input('response'),
        ]);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Chat data saved successfully',
            'data' => $chat,
        ]);
    }
}

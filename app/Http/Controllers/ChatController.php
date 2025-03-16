<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function saveChat(Request $request)
    {
        // Validate the request
        $request->validate([
            'pharmacy_name' => 'required|string',
            'pharmacy_email' => 'required|email',
            'pharmacy_contact' => 'required|string',
           
        ]);

        // Process user inputs
        $pharmacyName = $request->input('pharmacy_name');
        $pharmacyEmail = $request->input('pharmacy_email');
        $pharmacyContact = $request->input('pharmacy_contact');

        // Process file upload (if present)
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Save file to storage
        }

        // Save data to database
        $chat = Chat::create([
            'pharmacy_name' => $pharmacyName,
            'pharmacy_email' => $pharmacyEmail,
            'pharmacy_contact' => $pharmacyContact,
            
        ]);

        return response()->json([
            'message' => 'Chat saved successfully!',
            'data' => $chat,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('front.pages.user.chat');
    }
    
    public function getContacts()
    {
        $contacts = User::all();
        return response()->json($contacts);
    } 
}

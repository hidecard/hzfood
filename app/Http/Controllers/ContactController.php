<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
class ContactController extends Controller
{
    public function message_list() {
        $messages = contact::all();
        return view('admin.layout.message.message', compact('messages'));
    }
}

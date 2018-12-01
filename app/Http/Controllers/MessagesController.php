<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Http\Resources\Messages as MessagesResource;

class MessagesController extends Controller
{
    //
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newMessage = new \App\Messages();
        
        $newMessage->message = $request->input('message');
        $newMessage->save();

        return new MessagesResource($newMessage);
    }
}
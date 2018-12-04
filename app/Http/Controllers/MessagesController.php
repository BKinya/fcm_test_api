<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Tokens;
use App\FirebaseHelper;
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

        //get tokens
        // $tokens = \App\TokensModel::pluck('token_string');
        
        // return TokensModelResource::collection($tokens); 
        
        //FirebaseHelper instance
        // $firebaseHelper = new \FirebaseHelper();
        // $message = array(
        //     'message' => $newMessage
        // );
        // $message_status = sendPushNotifications($tokens, $message);

        // return $message_status;
        
    }
}
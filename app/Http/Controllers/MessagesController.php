<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\TokensModel;
use App\FirebaseHelper;
use App\Http\Resources\Messages as MessagesResource;
use App\Http\Resources\TokensModel as TokensModelResource;

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

        

        //get tokens
        $tokens = \App\TokensModel::get(['token_string'])->value('token_string');
        
        
        
        //FirebaseHelper instance
         $firebaseHelper = new \FirebaseHelper();
        $message = array(
            'message' => $newMessage
        );
        $message_status = $firebaseHelper->sendPushNotifications($tokens, $message);

        return $tokens;
        
    }
}
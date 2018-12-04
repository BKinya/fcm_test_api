<?php
    class FirebaseHelper{
        //function  to trigger firebase notifications
        function sendPushNotifications($tokens, $message){

            //firebase server url to send curl request
            $url = 'https://fcm.googleapis.com/fcm/send';

            $fields = array (
                    'to' => $tokens,
                    'data' => $message
                    
            );

            //Authorization headers
            $headers = array (
                    'Authorization:key=AAAARxHe2zg:APA91bFiAWGh9px1MN9sI0wB3v7mZ5C45UyAEc0v9nJQHjLvY7H_BZBgcG8xJ3zo8eW2xKQbwq-WJZSLH4TNBLTwmLQfGYDeubeXV6rZlUTaHzCfo-DDKb-MSjHim5A0hZs4_pauaufL',
                    'Content-Type: application/json'
            );

            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($fields ));

            $result = curl_exec ( $ch );
            if($result===false){
                die("Curl failed: ".curl_error($ch));

            }
            curl_close ( $ch );

            return $result;

        }
    }
?>
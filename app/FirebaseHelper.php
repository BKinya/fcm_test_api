<?php
    class FirebaseHelper{
        //function  to trigger firebase notifications
        function sendPushNotifications($tokens, $message){

            //firebase server url to send curl request
            $url = 'https://fcm.googleapis.com/fcm/send';

            $fields = array (
                    'registration_ids' => $tokens,
                    'data' => $message
                    
            );

            //Authorization headers
            $headers = array (
                    'Authorization: key=' . "YOUR_KEY_HERE",
                    'Content-Type: application/json'
            );

            $ch = curl_init ();
            curl_setopt ( $ch, CURLOPT_URL, $url );
            curl_setopt ( $ch, CURLOPT_POST, true );
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

            $result = curl_exec ( $ch );
            if($result===false){
                die("Curl failed: ".curl_error($ch));

            }
            curl_close ( $ch );

            return $result;

        }
    }
?>
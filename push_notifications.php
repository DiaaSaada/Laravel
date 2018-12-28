<?php



public static function pushNotification($deviceToken, $title, $body, $keyValueArray )
    {
        $msg = array(
            'title' => $title,
            'body' => $body,
            'vibrate' => 1,
            "sound" => "car_lock_sms.caf",
            "content_available" => true
        );

        $fields = array
        (
            'to' => $deviceToken,
            'notification' => $msg,
            'data' => $keyValueArray
        );

        $headers = array
        (
            'Authorization: key=' . Config::get('FB_API_ACCESS_KEY'),
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }
	
	
	
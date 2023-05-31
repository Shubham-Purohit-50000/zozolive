<?php
namespace App\Http\Traits;

trait SendNotificationTrait
{
    public function sendNotification($data,$user)
    {
        $payload = [
            'registration_ids'  => $user,
            "priority"          => "high",
            'data'              => $data
        ];
        $headers = [
            'Authorization: Key=' . config('services.firebase.server_key'),
            'Content-Type: application/json',
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        curl_exec($ch);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        if ($error) {
            return $error;
            return response()->json(['error' => $error]);
        } else {
            return 'Notification Send';
        }
    }
}
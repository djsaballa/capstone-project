<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SemaphoreController extends Controller
{
    public static function sendSms($phone, $message)
    {
        $client = new Client([
            'base_uri' => 'https://api.semaphore.co/api/v4/',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $response = $client->post('messages', [
            'json' => [
                'apikey' => 'ebab0d8bf81a1e039f7b28c6d79445a4',
                'number' => $phone,
                'message' => $message,
                'sendername' => 'ADDFII'
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}

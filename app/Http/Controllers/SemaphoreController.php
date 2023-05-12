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
                'apikey' => env('SEMAPHORE_KEY'),
                'number' => $phone,
                'message' => $message,
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}

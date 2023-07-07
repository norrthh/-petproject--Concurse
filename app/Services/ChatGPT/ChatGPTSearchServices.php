<?php

namespace App\Services\ChatGPT;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ChatGPTSearchServices
{
    public function search(array $data)
    {
        return $this->sendRequest($data['prompt']);
    }

    protected function sendRequest(string $prompt)
    {
//        return Http::withHeaders([
//            'Authorization' => 'Bearer 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',
//        ])->post('https://api.openai.com/v1/engines/davinci-codex/completions', [
//            'prompt' => request('prompt'),
//            'max_tokens' => 50,
//        ])->json();

        $client = new Client();

        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer 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',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => 'Hello!'],
                ],
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
